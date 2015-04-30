/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
     config.skin='office2013';
     var str=location.href;
     var search="egoji";
	 var pos = str.search(search);
     var url=rootDirectory+"/plugin/";
	 //var url= "../../plugin/";
    filebrowserBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = url+'kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = url+'kcfinder/upload.php?opener=ckeditor&type=flash';
   
};
