$(document)
		.ready(
				function() {
					// Initialize the Image Gallery widget:
					var gallery = $('#gallery');
					var url;
					var imageMetadataItems = imagesMetadata.items;
					
					for (var i = 0, il = imageMetadataItems.length; i < il; i++) {
					    var imageMetadataItem = imageMetadataItems[i];
						url = "https://googledrive.com/host/0B44EmdT9aQ2VOVZHalpva2dGb0U/"
								+ imageMetadataItem.originalFilename;
						$('<a data-gallery="gallery"/>').append(
						   $('<img width="60" height="70"/>').prop('src', url)).prop(//imageMetadataItem.thumbnailLink
						       'href', url).prop('title', imageMetadataItem.title).appendTo(gallery);
					}
					$('#gallery').imagegallery();					
				});

imagesMetadata = 