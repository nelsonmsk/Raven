$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Basics	
    //var host = "http://localhost/ConstructionFirmApp/public";
    var host = $('meta[name="env"]').attr('content');

   //get the main template settings
    var sdurl = host + '/AppDefaults';
    var $rtemplate = [];
	if($rtemplate.length == 0){
		$.get(sdurl, function(response) {
			$rtemplate = response.rtemplate;

	        var sideTitle = $('.sidebar').find('.logo').children('.nav-link');
			sideTitle.html($rtemplate['appDefaults'].appTitle);
			
			var siteTitle = $('.navbar-brand').find('.nav-link');
			siteTitle.html($rtemplate['appDefaults'].appTitle);

			var Title = $('.page-text').find('p').children('span');
			Title.html($rtemplate['appDefaults'].appTitle);

			var footerTitle = $('.footer').find('a').children('span.title');
			footerTitle.html($rtemplate['appDefaults'].appTitle);
			
			var footerLink = $('.footer').find('span').children('a.title');
			footerLink.prop("href",$rtemplate['appDefaults'].email);		
		}); 
	}else{
	        var sideTitle = $('.sidebar').find('.logo').children('.nav-link');
			sideTitle.html($rtemplate['appDefaults'].appTitle);
			
			var siteTitle = $('.navbar-brand').find('.nav-link');
			siteTitle.html($rtemplate['appDefaults'].appTitle);

			var Title = $('.page-text').find('p').children('span');
			Title.html($rtemplate['appDefaults'].appTitle);

			var footerTitle = $('.footer').find('a').children('span.title');
			footerTitle.html($rtemplate['appDefaults'].appTitle);
			
			var footerLink = $('.footer').find('span').children('a.title');
			footerLink.prop("href",$rtemplate['appDefaults'].email);		
	}

	//get the dashboard notifications
    var $notifications_url = host + '/notifications';
    var $notifications_combo = [];
	if (!($('body').hasClass('off-canvas-sidebar'))) {
		if($notifications_combo == 0){
			$.get($notifications_url, function(response) { 	
				$notifications_combo = response.notifications_combo;	
				
				var nts1 = $('.navbar-nav').find('.dropdown-menu').children('.not1');
					nts1.html('<i class="fa fa-envelope text-default"></i>' + 'You have ' + $notifications_combo['unread_messages'] + ' unread messages' );
					
				var nts2 = $('.navbar-nav').find('.dropdown-menu').children('.not2');
					nts2.html('<i class="fa fa-envelope-open text-warning"></i>' + $notifications_combo['received_mailsubs'] + ' new mail subscription requests' );
					
				var nts3 = $('.navbar-nav').find('.dropdown-menu').children('.not3');
					nts3.html('<i class="fa fa-envelope-open text-success"></i>' + $notifications_combo['confirmed_mailsubs'] + ' new mail subscriptions confirmations' );
					
				var nts4 = $('.navbar-nav').find('.dropdown-menu').children('.not4');
					nts4.html('<i class="fa fa-envelope-open text-danger"></i>' + $notifications_combo['cancelled_mailsubs'] + ' new mail subscriptions cancellations' );		
					
				var	$show_num = $notifications_combo['unread_messages'] + $notifications_combo['received_mailsubs'] + $notifications_combo['confirmed_mailsubs'] +
					$notifications_combo['cancelled_mailsubs'];
				
				var $icon_num = $('.navbar-nav').find('.nav-link').children('.notification');
					$icon_num.html($show_num );				
			});
		}else{
			
				var nts1 = $('.navbar-nav').find('.dropdown-menu').children('.not1');
					nts1.html('<i class="fa fa-envelope text-default"></i>' + 'You have ' + $notifications_combo['unread_messages'] + ' unread messages' );
					
				var nts2 = $('.navbar-nav').find('.dropdown-menu').children('.not2');
					nts2.html('<i class="fa fa-envelope-open text-warning"></i>' + $notifications_combo['received_mailsubs'] + ' new mail subscription requests' );
					
				var nts3 = $('.navbar-nav').find('.dropdown-menu').children('.not3');
					nts3.html('<i class="fa fa-envelope-open text-success"></i>' + $notifications_combo['confirmed_mailsubs'] + ' new mail subscriptions confirmations' );
					
				var nts4 = $('.navbar-nav').find('.dropdown-menu').children('.not4');
					nts4.html('<i class="fa fa-envelope-open text-danger"></i>' + $notifications_combo['cancelled_mailsubs'] + ' new mail subscriptions cancellations' );		
				
				var	$show_num = $notifications_combo['unread_messages'] + $notifications_combo['received_mailsubs'] + $notifications_combo['confirmed_mailsubs'] +
					$notifications_combo['cancelled_mailsubs'];
				
				var $icon_num = $('.navbar-nav').find('.nav-link').children('.notification');
					$icon_num.html($show_num );			
		}
	}


    /*when click edit button*/

    $('body').on('click', '#edit-btn', function(e) {
        e.preventDefault();
        var gid = $(this).data('id');
        var gbase = $(this).attr('href');
        var geturl = host + '/' + gbase + '/edit';
        $.get(geturl, function(response) {			
			if (response.error){		
				 Swal.fire({title: "Ooops!!",text: response.error.message,timer: 6000,showConfirmButton: true,type: "error"});	
			} else {			
            window.location.replace(geturl);
			}
        })
    });

    /*when click show button*/
    $('body').on('click', '#show-btn', function(e) {
        e.preventDefault();
        var swid = $(this).data('id');
        var swbase = $(this).attr('href');
        var swurl = host + '/' + swbase;
        $.get(swurl, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            window.location.replace(swurl);
        })
    });
	
    /*when click show button*/
    $('body').on('click', '#project-show-btn', function(e) {
        e.preventDefault();
        var pswid = $(this).data('id');
        var pswbase = $(this).attr('href');
        var pswurl = host + '/' + pswbase;
        $.get(pswurl, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            //window.location.replace(swurl);
        })
    });

    //if the user clicks the delete button
    $('body').on('click', '#delete-btn', function(e) {
        e.preventDefault();
        var dbase = $(this).attr("href");
        var redir = $(this).attr("action");		
        Swal.fire({
                title: "Warning!",
                text: '"Confirm you want to delete ?"',
                showConfirmButton: true,
                showCancelButton: true,
                type: "warning"
            }).then(function(result) {

                console.log(result.value);
                if (result.value == true) {
                    var d_url = host + '/' + dbase;
					var newdir = host + '/' + redir;
                    $.ajax({
                            type: "DELETE",
                            url: d_url,
                        })
                        .done(function(response) {
                            if (response.success) {

                                console.log(response.success);

                                Swal.fire({
                                    title: "Done" ,
                                    text: response.success.message,
                                    timer: 6000,
                                    showConfirmButton: false,
                                    type: "success"
                                });
                                window.location.replace(newdir);

                            } else {
                                console.log('Error:', response.error);
                                Swal.fire("Process Failed!", "Cannot" + actionType + "now!", 'error');
                            }
                        })
                        .fail(function() {

                            console.log('Error:', 'Process Failed Entirely');
                            Swal.fire("Process Failed!", "Cannot delete now!", 'error');
                        });
                } 
            })
            .catch(swal.noop);
    });

    //when user clicks search button on the search form
  var scForm = '';
    scForm = $('.searchForm');
    scForm.submit(function(e) {	
        e.preventDefault();
        var search_text = $('#search_text').val();
        var sc = scForm.attr('action');			
		var search_url = host + '/' + sc + '?search_text=' + search_text +'&Search=';	
		console.log('search_url:',search_url);
        $.get(search_url, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            window.location.replace(search_url);
        });		
	});
	
	

    //when user clicks Update or Create new button on a regular form
    var sForm = '';
    sForm = $('.singleForm');
    sForm.submit(function(e) {

        e.preventDefault();
		var actionType = $('#save-btn').attr('name');

        var type = "POST"; //for creating a new resource
        var id = $('#id').val();
        var base = sForm.attr('action');
        var my_url = host + '/' + base;
		var redirect = my_url;
		
        if (actionType == "Update") {
            type = "PUT"; //for updating a resource
            my_url += '/' + id;	
        }else if (actionType == "Send") {
            type = "POST"; //for sending a resource
            my_url += '/send';
			console.log('url :',my_url);		
        }		
		

        $.ajax({
                url: my_url,
                type: type,
                data: sForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {
                console.log(response);
                if (response.success) {
                    switch (actionType) 
					{ 
						case "Save" :
						{//if user created a new record	
							Swal.fire({
								title: "Completed Saving",
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(my_url);	
						} 
						break
						case "Send":
						{ //if user sent an existing record 
							Swal.fire({
								title: "Completed Sending" ,
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(redirect);
					    }
						break				   
						case "Update" :
						{ //if user updated an existing record 
							Swal.fire({
								title: "Completed Updating" ,
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(redirect);
						}
						break
					}	
                } else {
                    Swal.fire("Oops error!", response.error.message, 'error');
                }
            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status + errors.responseText);
                sForm.prepend(errors);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');
            });
    });
	
        //check if Submitted form has file inputs for uploads
        var xForm = '';
        xForm = $('.fileupload');
        var xfForm = $('.fileupload');
        var xsForm = xForm.serializeArray();
        var fname = xForm.attr('id');

        switch (fname) //make url from form-id 
        {
            case "galleryImages-form1":
                {
                    var xurl = 'galleryImages';
                    var up_url = host + '/' + xurl;
					var mType = "POST";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "newsletters-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'newsletters/' + xid;
                    var up_url = host + '/' + xsurl;
					var mType = "PUT";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "newsletters-form1":
                {
                    var xurl = 'newsletters';
                    var up_url = host + '/' + xurl;
					var mType = "POST";					
                    console.log('url:', 'Process url ' + up_url);
                }
                break
        }

	//If the user clicks the submit button of an form with file uploads 
	Dropzone.autoDiscover = false;
	 $('.fileupload').dropzone({ // The camelized version of the ID of the form element
		// The dropzone configuration 
		clickable: ".dropzone",
		url: up_url,
		method: mType,
		previewsContainer: "#my-dropzone",
		autoProcessQueue: false,
		uploadMultiple: false,
		parallelUploads: 5,
		maxFiles: 5,
		maxFilesize: 1,
		acceptedFiles: 'image/*',
		addRemoveLinks: true,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		
		// The setting up of the dropzone
		init: function() {
			var myDropzone = this;
			var $id  = xid;

			$("#submit").click(function (e) {
				e.preventDefault();
				e.stopPropagation();
				myDropzone.processQueue();
			}); 
			
			if (mType == "PUT"){
				
				switch (fname) //make url from form-id 
				{					
					case "testimonials-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("name", $("#name").val());					
								formData.append("title", $("#title").val());
								formData.append("comment", $("#comment").val());
								formData.append("pageId", $("#pageId").val());								
								formData.append("_token", $("#_token").val());
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
							});
						}
						break
					case "newsletters-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("title", $("#title").val());					
								formData.append("type", $("#type").val());
								formData.append("summary", $("#summary").val());
								formData.append("created_by", $("#created_by").val());
								formData.append("status", $("#status").val());								
								formData.append("_token", $("#_token").val());
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
							});
						}
						break						
				}
			} else {
				
				switch (fname) //make url from form-id 
				{
					case "galleryImages-form1":
						{				
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {	
								formData.append("_token", $("#_token").val());							
								formData.append("ref_class", $("#ref_class").val());					
								formData.append("ref_id", $("#ref_id").val());
								formData.append("title", $("#title").val());								
								formData.append("description", $("#description").val());								
							});
						}
						break						
					case "newsletters-form1":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("title", $("#title").val());					
								formData.append("type", $("#type").val());
								formData.append("summary", $("#summary").val());
								formData.append("created_by", $("#created_by").val());
												
							});
						}
						break							
				}
			}
			
			
			//success callback :
			this.on("success", function(files,response) {
                    if (response.success) {
                        console.log('Done:', 'Process Status ' + response.success.message);
                        Swal.fire("Completed!", response.success.message, 'success');
                        window.location.replace(up_url);

                    } else {
                        console.log('Validation Error:', 'Process Status ' + response.error.message);
                        Swal.fire("Validation Error!", response.error.message, 'error');

                    }
			});	
			//error callback:
			this.on("error", function(files,response)  {
				console.log('error:',response.errors);
				console.log('error:',response.message);				
				console.log('error:',files);				
				console.log('token:',$("#_token").val());
                    Swal.fire("Process Error!", 'File upload failed.', 'error');
			});			
		}
	});
	
    //if the guest user makes a login attempt
    var $userno;
    var lForm = $('#loginForm');

    lForm.submit(function(e) {
        e.preventDefault();
        var lbase = lForm.attr('action');
        var l_url = host + '/' + lbase;

        $.ajax({
                url: l_url,
                type: 'POST',
                data: lForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {
                console.log(response);
                if (response.success) {
                    //if attempt successful
                    Swal.fire({
                        title: "Hi " + response.success.username,
                        text: response.success.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    var loggedIn = host + '/' + response.success.url;
                    $userno = response.success.userno;
                    console.log('success:' + loggedIn);
                    window.location.replace(loggedIn);
                } else { //if user attempt failed
                    Swal.fire({
                        title: "Hi Guest",
                        text: response.error.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    //window.location.replace(redirect);
                }
            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status, 'MESSAGE:' + errors.message);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');
            });
    });


    //if the guest user makes a logout attempt
    var Outlink = $('#logout-link');
    var OForm = $('#logoutForm');

    Outlink.click(function(e) {
        var laddress = $(this).attr('href');
        e.preventDefault();
        OForm.submit();
    });

    OForm.submit(function(e) {
        e.preventDefault();
        var obase = OForm.attr('action');
        var o_url = host + '/' + obase;

        $.ajax({
                url: o_url,
                type: 'POST',
                data: OForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {
                if (response.success) {
                    //if attempt successful
                    Swal.fire({
                        title: "Bye ",
                        text: response.success.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    var logOut = host + '/' + response.success.url;
                    console.log('Success:' + logOut);
                    window.location.replace(logOut);
                } else { //Error on server 
                    Swal.fire({
                        title: "Hi",
                        text: response.error.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    //window.location.replace(redirect);
                }
            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status, 'MESSAGE:' + errors.exception);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');
            });
    });
	
	
    //when user clicks lookup button on a report form
    var rForm = '';
    rForm = $('.reportForm');
    rForm.submit(function(e) {
        e.preventDefault();
        var actionType = $('#submit').html();
        var type = "POST"; //for creating a new resource
        var id = $('#id').val();
        var base = rForm.attr('action');
        var my_url ='';
		
        if (actionType == "Update") {
            type = "PUT"; //for updating a resource
			var redirect = my_url;
            my_url += '/' + id;
        }
		if (actionType == "Save") {
            type = "POST"; //for updating a resource
			var mod = "subsreports/savereport";  
			my_url = host + '/' + mod;
			console.log('url',my_url);
        }		

        $.ajax({
                url: my_url,
                type: type,
                data: rForm.serialize(),
                dataType: 'json',
            })
           .done(function(response) {
                console.log(response);
                if (response.success) {
                    if (actionType == "Save") { //if user created a new schedule record
                        Swal.fire({
                            title: "Completed Saving",
                            text: response.success.message,
                            timer: 6000,
                            showConfirmButton: false,
                            type: "success"
                        });
                        window.location.replace(my_url);
					}
                } 
            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status + errors.responseText);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');
            }); 
    }); 

    //if the clicks on the submit button
    var cForm = $('#contactForm');

    cForm.submit(function(e) {
        e.preventDefault();
        var cbase = cForm.attr('action');
        var c_url = host + '/' + cbase;

        $.ajax({
                url: c_url,
                type: 'POST',
                data: cForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {
                console.log(response);
                if (response.success) {
                    //if attempt successful
					Swal.fire({
						title: "Completed Sending" ,
						text: response.success.message,
						timer: 6000,
						showConfirmButton: false,
						type: "success"
					});
					///window.location.replace(#!);
					
                } else {
                    Swal.fire("Oops error!", response.error.message, 'error');
                }
            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status, 'MESSAGE:' + errors.responseText);
                Swal.fire("Sending Failed!", "Please try again!", 'error');
            });
    });



    /**if the user clicks gallery item*/
    $('.gallery-link').click(function(e) {
        e.preventDefault();
        var glink = e.target;
        console.log('clicked link', glink);
        var $pic = $(this).find('img.gallery-item');
        var $picId = $($pic).attr('id');
        var $picSrc = $($pic).attr('src');

        var $picName = $($pic).attr('alt');
        console.log('clicked pic', $picId);

        Swal.fire({
            title: $picName,
            html: '',
            imageUrl: $picSrc,
            imageWidth: 900,
            imageHeight: 600,
            showConfirmButton: false,
            showCancelButton: false,
            cancelButtonColor: '#d33',

        })

    });

});