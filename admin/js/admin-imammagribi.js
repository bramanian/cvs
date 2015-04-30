/*--- Inbox ----*/
		$("#file").click(function(){
		var	$folder=$("#file").attr("data-file");
		var btnUpload=$('#file');
		new AjaxUpload(btnUpload, {
			action: rootDirectory+'/file/photo',
			name: 'uploadfile',
			data:{tipe:$folder},
			type:'post',
			onSubmit: function(file, ext){
						$("#prosesFile").show();
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				 			$("#prosesFile").hide();
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				
			},
			onComplete: function(file, response){
				$data=JSON.parse(response);
				$("#prosesFile").hide();				
				if($data.status=="success")
				{
				$("#upload").attr("src",$data.url);
				$("#filePhoto").val($data.value);
			    }else{
				   alert('Gagal Upload File'+response);
				}
			 
			}
		});
		});	
		
 function onClickTableMessage(data){      
 var id=$(data).attr("data-id");
 var nama=$(data).attr("data-nama");
        $.ajax({
             url:rootDirectory+"/admin/pesan/baca/"+id+"/"+nama,
             type: 'GET',
             beforeSend: function (xhr) { },
             success: function (data, textStatus, jqXHR) {  
			 var data = jQuery.parseJSON(data);
			  $("#firstdeletePesan").attr("onclick","javascript:location.href='"+rootDirectory+"/admin/pesan/hapus/"+data.id+"'");
			  $("#firstdeletePesan").attr("data-id",data.id);
              $("#nama").html("&nbsp;&nbsp;&nbsp;"+data.nama);
			  $("#tabPesan").html(data.nama)
			  $("#kontak").html("&nbsp;&nbsp;&nbsp;"+data.kontak);
			  $("#email").html("&nbsp;&nbsp;&nbsp;"+data.email);
			  $("#pesan").html("&nbsp;&nbsp;&nbsp;"+data.pesan);
			  $(".nav-tabs").removeClass("hidden");
			  $('#myTabs a:last').tab('show');
			  },
             error: function (jqXHR, textStatus, errorThrown) {
			   var responseText = jQuery.parseJSON(jqXHR.responseText);
               alert(jqXHR.responseText); 
			  
			               document.getElementById("body-page").innerHTML="<a class='btn btn-primary'>Tester</a>";

                    }
           });
   }
   
   function onClickBackMessage(data){
          $.ajax({
             url:"<?php echo URL::to('/admin/message/inbox');?>",
             beforeSend: function (xhr) {
                    },
             success: function (data, textStatus, jqXHR) {    
                       $("#body-page-wrapper").html(data);
                     },
             error: function (jqXHR, textStatus, errorThrown) {
                       alert(jqXHR);
                    }
           });
   }
   function onClickDeteleMessage(data){
      var id= $(data).attr("data-id");
	  $(".nav-tabs").addClass("hidden");
   $('#myTabs a:first').tab('show');
        $.ajax({
            url:"/admin/pesan/delete/"+id,
            type: 'get',
            beforeSend: function (xhr) 
			{ },
            success: function (data, textStatus, jqXHR) {
             if(data!="0")
                       $("#body-page-wrapper").html(data); 
                    },
            error: function (jqXHR, textStatus, errorThrown) {
                        alert(textStatus);
                    }
        });
   
   }
   function onClickCheckedAllMessage(data){
                var value=$(data).is( ":checked" );
                if(value){
                  $('input[type="checkbox"]').attr('checked','checked');

                }else{
                      $('input[type="checkbox"]').removeAttr("checked"); 
                }
    }
               function onClickformDeleteMessage(){
                  var data=$('#formDeleteMessage').serializeArray();
                    $.ajax({
                        url:rootDirectory+"/admin/pesan/hapus/"+"All",
                        type: 'GET',
                        data:data,
                        beforeSend: function (xhr) {
                                },
                        success: function (data, textStatus, jqXHR) {
						alert(data);
						 if(data=="berhasil")
						 {
						 alert("Penghapusan pesan berhasil");
						 window.location.href=rootDirectory+"/admin/pesan";
						 }else{
						 alert("Penghapusan pesan gagal");
						 }
                            

                                },
                        error: function (jqXHR, textStatus, errorThrown) {
		                    var responseText = jQuery.parseJSON(jqXHR.responseText);
                           alert(jqXHR.responseText); 
                                }
                    });      

               }   
	 
/*---Tips ----*/	 


      $('a.linkDelete').click(function(){
	  
 var id=$(data).attr("data-id");
 var nama=$(data).attr("data-nama");
        $.ajax({
             url:rootDirectory+"/admin/pesan/baca/"+id+"/"+nama,
             type: 'GET',
             beforeSend: function (xhr) { },
             success: function (data, textStatus, jqXHR) {  
			 var data = jQuery.parseJSON(data);
			  $("#firstdeletePesan").attr("onclick","javascript:location.href='"+rootDirectory+"/admin/pesan/hapus/"+data.id+"'");
			  $("#firstdeletePesan").attr("data-id",data.id);
              $("#nama").html("&nbsp;&nbsp;&nbsp;"+data.nama);
			  $("#tabPesan").html(data.nama)
			  $("#kontak").html("&nbsp;&nbsp;&nbsp;"+data.kontak);
			  $("#email").html("&nbsp;&nbsp;&nbsp;"+data.email);
			  $("#pesan").html("&nbsp;&nbsp;&nbsp;"+data.pesan);
			  $(".nav-tabs").removeClass("hidden");
			  $('#myTabs a:last').tab('show');
			  },
             error: function (jqXHR, textStatus, errorThrown) {
			   var responseText = jQuery.parseJSON(jqXHR.responseText);
               alert(jqXHR.responseText); 
			  
			               document.getElementById("body-page").innerHTML="<a class='btn btn-primary'>Tester</a>";

                    }
           });	  
          
      });
	  
	  $("input[type='checkbox',id='']").click(function(){
	  
	  if($(this).is(':checked'))
	  {
	  
	    $("#linkUpdate").attr("href",rootDirectory+"/admin/"+$("#formDelete").attr("action")+"/"+$(this).val()+"/update");
	  }else{
	  
	    $("#linkUpdate").attr("href","#belumdipilih");
	  }
	  })
	  
      $('a.formUpdate').click(function(){
          $("input[type='hidden']").attr("value","prosesupdate");
          $("#formDelete").submit();
          
      });

	  
	 function deleteAllManage(nama){
	 
var data=$('#formmanager').serializeArray();
var  urlaction=rootDirectory+"/"+nama;
$.ajax({
	url:urlaction+'/deleteall',
	data:data,
	type:'POST',
	beforeSend:function(){},
	success:function(data){
htmldatacontent(data,urlaction,nama);

},
error:function( data, textStatus, jqXHR ){
alert("Gagal")
}
});

	 
}

function htmldatacontent(data,urlaction,nama){

var html="";
var obj = JSON.parse(data);

$("#content-data").html(html);

	for(var n=0;n<obj.length;n++)
	{
    var id=obj[n].id;
	var mod=(n+1)%2;
	
	if(mod==1)
	{
			html=html+'<tr class="danger" >';
			html=html+'<td><input type="checkbox"  name="post[]" value="'+id+'"></td>  ';
			html=html+'<td>'+(n+1)+'</td>';
			html=html+' <td>'+obj[n].nama+'</td>';
			 html=html+'<td><img src="'+obj[n].image+'" width="50" height="50"></td> ';
			html=html+'<td>'+obj[n].sortdesc.substring(0,144)+' ...</td> ';
			html=html+'<td>'+obj[n].desc.substring(0,144)+' ...</td> ';
			 html=html+'<td> ';
			 html=html+'<a class=" btn btn-primary" href="'+urlaction+"/"+id+'"><i class="fa fa-search"></i></a> &nbsp;';
			html=html+'<a class=" btn btn-warning" href="'+urlaction+"/"+id+'/edit"><i class="fa fa-edit"></i></a>&nbsp';
			html=html+'<a class=" btn btn-danger" href="'+urlaction+"/"+id+'/delete"><i class="fa fa-trash-o"></i></a>&nbsp';
			html=html+'</td>';
			html=html+'</tr>'; 
			}else{
			html=html+'<tr class="danger" >';
			html=html+'<td><input type="checkbox"  name="post[]" value="'+id+'"></td>  ';
			html=html+'<td>'+(n+1)+'</td>';
			html=html+' <td>'+obj[n].nama+'</td>';
			 html=html+'<td><img src="'+obj[n].image+'" width="50" height="50"></td> ';
			html=html+'<td>'+obj[n].sortdesc.substring(0,144)+' ...</td> ';
			html=html+'<td>'+obj[n].desc.substring(0,144)+' ...</td> ';
			 html=html+'<td> ';
			 html=html+'<a class=" btn btn-primary" href="'+urlaction+"/"+id+'"><i class="fa fa-search"></i></a> &nbsp;';
			html=html+'<a class=" btn btn-warning" href="'+urlaction+"/"+id+'/edit"><i class="fa fa-edit"></i></a>&nbsp';
			html=html+'<a class=" btn btn-danger" href="'+urlaction+"/"+id+'/delete"><i class="fa fa-trash-o"></i></a>&nbsp';
			html=html+'</td>';
			html=html+'</tr>'; 
			
			}
	}

$("h4.alert-success, h4.alert-warning").hide();
		$("#content-data").html(html);
		 
}
function base64_decode(data) {
  //  discuss at: http://phpjs.org/functions/base64_decode/
  // original by: Tyler Akins (http://rumkin.com)
  // improved by: Thunder.m
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //    input by: Aman Gupta
  //    input by: Brett Zamir (http://brett-zamir.me)
  // bugfixed by: Onno Marsman
  // bugfixed by: Pellentesque Malesuada
  // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //   example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA==');
  //   returns 1: 'Kevin van Zonneveld'
  //   example 2: base64_decode('YQ===');
  //   returns 2: 'a'

  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    dec = '',
    tmp_arr = [];

  if (!data) {
    return data;
  }

  data += '';

  do { // unpack four hexets into three octets using index points in b64
    h1 = b64.indexOf(data.charAt(i++));
    h2 = b64.indexOf(data.charAt(i++));
    h3 = b64.indexOf(data.charAt(i++));
    h4 = b64.indexOf(data.charAt(i++));

    bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

    o1 = bits >> 16 & 0xff;
    o2 = bits >> 8 & 0xff;
    o3 = bits & 0xff;

    if (h3 == 64) {
      tmp_arr[ac++] = String.fromCharCode(o1);
    } else if (h4 == 64) {
      tmp_arr[ac++] = String.fromCharCode(o1, o2);
    } else {
      tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
    }
  } while (i < data.length);

  dec = tmp_arr.join('');

  return dec.replace(/\0+$/, '');
}
function base64_encode(data) {
  //  discuss at: http://phpjs.org/functions/base64_encode/
  // original by: Tyler Akins (http://rumkin.com)
  // improved by: Bayron Guevara
  // improved by: Thunder.m
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Rafał Kukawski (http://kukawski.pl)
  // bugfixed by: Pellentesque Malesuada
  //   example 1: base64_encode('Kevin van Zonneveld');
  //   returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
  //   example 2: base64_encode('a');
  //   returns 2: 'YQ=='

  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '',
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
}
/* ========================================================
							KCFFINDER FILE SELECTED AND OPEN
========================================================
 */
 function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
			var urlImage=document.getElementById("urlImage").value=url;
	         
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" />';
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open(rootDirectory+'/plugin/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}		

				
	 