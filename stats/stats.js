
$(document).ready(
  function() {
	  //get the projects
	  $x.submission({
		  "ref" : "simpath:instance('projects-metadata')",
		  "resource" : "generate-projects-metadata.php",
		  "mode" : "synchronous",
		  "method" : "get"
	  });

	  document.body.appendChild($x.instance('projects-metadata').root().cloneNode(true));
	  
});
