// Copyright (c) 2012 The Chromium Authors. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/**
 * Global variable containing the query we'd like to pass to Flickr. In this
 * case, goods!
 *
 * @type {string}
 */

var GoodGenerator = {
  
  searchOnFlickr_: 'http://localhost/site/goods.xml',

  /**
   * Sends an XHR GET request to grab photos of lots and lots of goods. The
   * XHR's 'onload' event is hooks up to the 'showPhotos_' method.
   *
   * @public
   */
  requestgoods: function() {
    var req = new XMLHttpRequest();
    req.open("GET", this.searchOnFlickr_, true);
	
    req.onload = this.showPhotos_.bind(this);
    req.send(null);
  },

  /**
   * Handle the 'onload' event of our Good XHR request, generated in
   * 'requestgoods', by generating 'img' elements, and stuffing them into
   * the document for display.
   *
   * @param {ProgressEvent} e The XHR ProgressEvent.
   * @private
   */
  showPhotos_: function (e) {
    var goods = e.target.responseXML.querySelectorAll('good');
    for (var i = 0; i < goods.length; i++) {
      var img = document.createElement('img');
      img.src = this.constructGoodURL_(goods[i]);
      img.setAttribute('alt', goods[i].getAttribute('Name'));
	  img.setAttribute('width', '75px');
	  img.setAttribute('height', '75px');
	  img.setAttribute('style','float:left');
      document.body.appendChild(img);
	  
	  var text = document.createElement('a');
	  text.setAttribute('href','http://localhost/site/good_det.php?id='+ goods[i].getAttribute('ID'));
	  text.setAttribute('style','margin-left:50;color:#f27f02;outline:none;text-decoration:none;');
	  text.textContent = (' ' + goods[i].getAttribute('Name'));
	  text.setAttribute('target','_blank');
	  document.body.appendChild(text);
	  
	  var text1 = document.createElement('h4');
	  text1.textContent = ('  ' + goods[i].getAttribute('Type'));
	  document.body.appendChild(text1);
	  
	  document.body.appendChild(document.createElement('br'));
	  document.body.appendChild(document.createElement('hr'));
    }
  },

  /**
   * Given a photo, construct a URL using the method outlined at
   * http://www.flickr.com/services/api/misc.urlGoodl
   *
   * @param {DOMElement} A Good.
   * @return {string} The Good's URL.
   * @private
   */
  constructGoodURL_: function (photo) {
    return "http://localhost/site/" + photo.getAttribute("Path");
  }
};

// Run our Good generation script as soon as the document's DOM is ready.
document.addEventListener('DOMContentLoaded', function () {
  GoodGenerator.requestgoods();
});
