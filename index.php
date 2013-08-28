<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CONTENTdm <?php echo $this->cdmCustomPageName;?></title>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	</head>
	<body>
	
	<?php
	switch ($_REQUEST['page']) {
    case '1':
		// actually POST the form
		include 'process.php';
		break;
    case '0':
    default:
	?>
		<div data-role="page">
			<header data-role="header">
				<h1>"<?php echo $this->collection; ?>"</h1>
			</header>
			<div data-role="content">
				
				<h2>Add Item</h2>
				<p><span style="color:#cd0a0a;">*</span> = required field</p>

				<form enctype="multipart/form-data" id="cdmWebAddForm" method="POST" action="/cdm/<?php echo $this->cdmCustomPage;?>/collection/<?php echo $this->collection;?>?page=1" data-ajax="false">
					<input type="hidden" name="webaddurl" value="<?php echo $this->cdmCustomPage; ?>" />
					<ul data-role="listview" data-inset="true">
						<li data-role="fieldcontain">
							<label>File: <span style="color:#cd0a0a;">*</span></label>
							<input type="file" id="CISOBROWSE" name="CISOBROWSE" value="" />
						</li>					
						<li data-role="fieldcontain">
							<label>Title: <span style="color:#cd0a0a;">*</span></label>
							<input type="text" id="FILETITLE" name="title" value="" />
						</li>
						<li data-role="fieldcontain">
							<label>Subject:</label>
							<input type="text" name="subjec" id="subjec" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label for="textarea">Description:</label>
							<textarea cols="40" rows="8" name="descri" id="descri"></textarea>
						</li>
						<li data-role="fieldcontain">
							<label>Creator:</label>
							<input type="text" name="creato" id="creato" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Publisher:</label>
							<input type="text" name="publis" id="publis" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Date:</label>
							<input type="date" name="date" id="date" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Type:</label>
							<input type="text" name="type" id="type" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Format:</label>
							<input type="text" name="format" id="format" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Contributors:</label>
							<input type="text" name="contri" id="contri" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Identifier:</label>
							<input type="text" name="identi" id="identi" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Source:</label>
							<input type="text" name="source" id="source" value=""  />
						</li>
						<li data-role="fieldcontain">
							<label>Language:</label>
							<input type="text" name="langua" id="langua" value=""  />
						</li>
					
						<li>
							<button data-theme="b" id="button" data-icon="check">Submit</button>
						</li>	
					</ul>
				</form>
			</div> 
		</div>

	<script type="text/javascript">
	var fieldnames = new Array();
	var i = 0;
	fieldnames[i++] = new Array("title","Title");
	fieldnames[i++] = new Array("subjec","Subject");
	fieldnames[i++] = new Array("descri","Description");
	fieldnames[i++] = new Array("creato","Creator");
	fieldnames[i++] = new Array("publis","Publisher");
	fieldnames[i++] = new Array("date","Date");
	fieldnames[i++] = new Array("type","Type");
	fieldnames[i++] = new Array("format","Format");
	fieldnames[i++] = new Array("contri","Contributors");
	fieldnames[i++] = new Array("identi","Identifier");
	fieldnames[i++] = new Array("source","Source");
	fieldnames[i++] = new Array("langua","Language");
	
	$(document).ready(function(){
		
		
		$("#button").click(function(event){
        /* prevent default form submission otherwise it wants to submit twice. */
        event.preventDefault();
			fpath = $.trim($("#CISOBROWSE").val());
			ftitle = $.trim($("#FILETITLE").val());
			if( fpath.length == 0 || ftitle.length == 0 ){
				alert("Both the File and the Title fields are required. Please try again.");
				return false;
			} else {
				bindWebAddForm();
			}
		});
	});

	function bindWebAddForm(){
		$("#cdmWebAddForm").submit();
	}
	  
	</script>
	
	<?php
		break;
	}
	?>
	</body>
</html>