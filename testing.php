<?PHP

if( TRUE==TRUE){
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/v4nodate.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>EGO TECHNOLOGY RECYCLING</title>
	<!-- InstanceEndEditable -->
      
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">     
    <link href="assets/css/toolkit-light.css" rel="stylesheet">   
    <link href="assets/css/swdstyles.css" rel="stylesheet">  
    <!-- InstanceBeginEditable name="head" -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	<style>
		.plots-filter .col-md-6 label{
			width:125px;
			justify-content:left;
		}
		.plots-filter .col-md-6 label.label-text{
			width:170px;
		}
		.plots-filter .col-md-6 .form-inline .form-control{
			width:calc(100% - 200px);
		}
		.plots-filter .col-md-6 .form-inline .form-control#column5_search{
			width: calc(100% - 200px);
		}
		.plots-filter .col-md-6 .form-inline .form-control#column6_search{
			width: calc(100% - 178px);
		}
		.plots-filter .col-md-6 .form-inline .form-control#column4_search{
			width: calc(100% - 200px);
		}
	</style>
    <!-- InstanceEndEditable -->
</head>


<body onload="swdshowloader()">
  <div id="swdloader"></div> 

 
  <!-- InstanceBeginEditable name="firstbody" --> 
  
  <!-- InstanceEndEditable --> 

  <div class="container" style="max-width:100%;width:100%">
    <div class="row">
      <div class="col-md-3 sidebar col-lg-2">
        <nav class="sidebar-nav">
          <div class="sidebar-header">
            <button class="nav-toggler nav-toggler-md sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
              <span class="sr-only">Toggle nav</span>
            </button>
            <a class="sidebar-brand" href="<?PHP echo $_SESSION["82j2ud2891166scurhp"] ?>">
              <img src="images/logo.png?<?php echo time(); ?>" alt="PrintMS 2019 Logo" class="img-fluid"/>
            </a>
          </div>
          <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
            <ul class="nav nav-pills nav-stacked flex-column">
            </ul>
            <hr class="visible-xs mt-3">
          </div>
        </nav>
		    <!-- InstanceBeginEditable name="sidebar" -->
    
	    <!-- InstanceEndEditable -->        
      </div> <!-- End Side Bar -->
      
      <div class="col-md-9 col-lg-10 content">
        <div class="dashhead">
          <div class="dashhead-titles">
            <!-- InstanceBeginEditable name="pagetitle" -->
            <!-- InstanceEndEditable -->  
          </div>
          <div class="btn-toolbar dashhead-toolbar">
            <div class="btn-toolbar-item">
              <button class="btn" type="button" data-toggle="" data-placement="bottom" data-original-title="Settings" onclick="swdopenNav()">
              <span class="icon icon-cog" ></span></button>
            </div>           
            <div class="btn-toolbar-item">
              <div id="notifyicon"></div>
            </div>           
            <div class="btn-toolbar-item">
              <a href="logout.php">
                <button class="btn" type="button" data-toggle="tooltip" data-placement="bottom" data-original-title="Log out">
                <span class="icon icon-log-out" ></span></button>
              </a>
            </div>  
          </div>   
        </div>
	      <hr class="mt-3">
        <div id="swdcontent" class="animate-bottom">    
 	        <!-- InstanceBeginEditable name="mainbody" -->
	<?PHP
		
		$lcToolBar = '<div class="btn-toolbar swd-borderbox-header">
			<a href="new_seller.php">
				<button class="btn mr-1" type="button" data-toggle="tooltip" title="New Seller">
					<span class="icon icon-add-user" ></span>
				</button>
			</a>';	
			
		echo $lcToolBar . "</div>";		
	
		// Spacer for Notifications...
		if(!empty($_SESSION["82j2ud2891166slastmsg"])){
			echo '<p class="alert alert-warning">' . $_SESSION["82j2ud2891166slastmsg"] . ' <a href="#" onclick="clearmsg()"><span class="float-right icon icon-cross"></span></a></p>';
		}		
	
		$lcFieldList = "sel.*,s.status";
		$sql = "SELECT " . $lcFieldList . " FROM seller as sel LEFT JOIN status as s on sel.status=s.sid";
		$result=mysqli_query($mysqllink,$sql);
									
		$rowsReturned = mysqli_num_rows($result);
			if($rowsReturned>0)
			{		
				$sql_seller = "SELECT * FROM seller";
				$result_seller=mysqli_query($mysqllink,$sql_seller);
				while($row_seller = mysqli_fetch_array($result_seller)) {
					$resultval[] = htmlentities($row_seller['company_name'], ENT_QUOTES);
				} 
				$sql_status = "SELECT * FROM status where linkto='SELLER' order by status_order";
				$result_status=mysqli_query($mysqllink,$sql_status);
			
			?>	
			
					<div class="row plots-filter">
						<div class="col-md-6">
							<div class='form-inline mb-3'>
								<label class="mr-2">Seller Filter: </label>
								<input type='text' id='column1_search' class='form-control  autocomplete' data-autocomplete='<?php echo json_encode($resultval); ?>'/>
							</div>
							
							<div class='form-inline mb-3'>
								<label class="mr-2">Email Filter: </label>
								<input type='text' id='column2_search' class='form-control'/>
							</div>
						</div>
						<div class="col-md-6">
							<div class='form-inline mb-3'>
								<label class="mr-2">Postal Code Filter: </label>
								<input type='text' id='column3_search' class='form-control'/>
							</div>
							<div class='form-inline mb-3'>
								<label class="mr-2">Status: </label>
								<select id='column4_search' class='form-control'>
									<option value=''>All</option>
									<?php
										while($row_status = mysqli_fetch_array($result_status)) {
									?>
											<option value='<?php echo $row_status['status']; ?>'><?php echo $row_status['status']; ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
									
					 <table class="table table-striped table-hover table-responsive-lg" id="example">
						<thead>
						  <tr>
						<?PHP
							if(trim($_SESSION["82j2ud2891166scurusertype"])==="SUPER") {
								// Show UID and Customer Name	
								echo "<th>ID</th>";
							}else{
								echo "<th></th>";
							}
						  ?>
							<th>Company Name</th>
							<th>Address</th>
							<th>Tel No.</th>                
							<th>Tel No.2</th>
							<th>Email</th>
							<th>Postal Code</th>
							<th>Website Address</th>
							<th>Notes</th>
							<th>Status</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
							while($row = mysqli_fetch_array($result)) {
						?>
							  <tr id='<?php echo $row['cid']; ?>' <?php echo "onclick=\"window.document.location='view_seller.php?023Slkaj29aANao2098usJSlkjl21J=" . mencrypt($row['sid']). "'\" style='cursor:pointer;'"; ?>>
								<?PHP
								
								
									if(trim($_SESSION["82j2ud2891166scurusertype"])==="SUPER") {
										echo "<td>" . trim($row['sid']) . "</td>";		
									}else{
								?>
								<td><span class="icon icon-magnifying-glass" ></span></td>
								<?php		
									}
								?>
								<td><?php echo $row['company_name']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><?php echo $row['tel']; ?></td>
								<td><?php echo $row['tel2']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['postal_code']; ?></td>               
								<td><?php echo $row['www']; ?></td>               
								<td><?php echo $row['notes']; ?></td>               
								<td><?php echo $row['status']; ?></td>               
							  </tr>
							<?php 	            
							}
							?>             
						</tbody>
					  </table>	
    	<?PHP
			}
		//Close connection
		include("db_close.php");				
		?>   
    <!-- InstanceEndEditable -->
    	  </div> <!-- swdcontent -->
      </div>  <!-- End content -->   

    </div> <!-- End Row -->
  </div> <!-- End Container -->


  <!-- InstanceBeginEditable name="footer" -->

<!-- InstanceEndEditable -->

  <!-- Footer -->   
  <div class="container" style="max-width:100%;width:100%">
    <div class="row" style="color:#666;">
      <div class="col-sm-12">
        <hr class="mt-3 mb-2 swdoffset">   
        <div class="d-flex flex-row-reverse">
          <div class="p-2">            
            <a class="sidebar-brand" href="<?PHP echo $_SESSION["82j2ud2891166scurhp"] ?>">
            <img src="images/<?PHP echo $_SESSION["82j2ud2891166scustlogo"].'?'.time(); ?>" alt="Customer Logo" class="img-fluid"/>
            </a>
          </div>
        </div>  
        <div>
          <?PHP include("swd_footerbrand.php") ?>            
        </div>                    
        <div class="d-flex flex-row-reverse">
          <div class="pt-3 pr-2">System Design SWD. Copyright &copy; SWD 2019. All rights reserved.</div>
        </div> 
        <div class="swdfooter-big-small"></div>                         		
      </div>
    </div> <!-- End Row -->
  </div> <!-- End Container -->


 	<script src="assets/js/chart.js"></script>  
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>     
 
  <script>
    // execute/clear BS loaders for docs
    $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
  </script>
    
  <!-- Custom --> 
	<script src="assets/js/swdcustom.js"></script>

	<!-- InstanceBeginEditable name="scripts" -->
	<script src="assets/js/tagmanager.min.js"></script>  
	<script src="assets/js/bootstrap3-typeahead.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>  
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>  
	<script src="assets/js/pushbar.min.js"></script>
	<script>
		$(document).ready(function() {
			new Pushbar({ blur: true, overlay: true });
			var dataSrc = [];
			var table = $('#example').dataTable({
				"pageLength": 100,
				"bInfo" : false,
				"lengthChange": false,
				"bPaginate": false,
				"dom": '<"top"fi>rt<"bottom"lp><"clear">',
				'initComplete': function(){
					var api = this.api();
						// Populate a dataset for autocomplete functionality
						// using data from first, second and third columns
						api.cells('tr', [1]).every(function(){
							// Get cell data as plain text
							var data = $('<div>').html(this.data()).text();           
							if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
						});
						// Sort dataset alphabetically
						dataSrc.sort();
					// Initialize Typeahead plug-in
					$('input[type="search"]', api.table().container()).typeahead({
						source: dataSrc,
						afterSelect: function(value){
							api.search(value).draw();
						}
					});
				}
			});
			var column5_search_val = $( "#column5_search" ).val();
			table.api().columns( 6 ).search( column5_search_val ).draw();
			$('#column1_search').on( 'keyup', function () {
				table.api().columns( 1 ).search( this.value ).draw();
			});
			$('#column2_search').on( 'keyup', function () {
				table.api().columns( 5 ).search( this.value ).draw();
			});
			$('#column3_search').on( 'change', function () {
				table.api().columns( 6 ).search( this.value ).draw();
			});
			$('#column4_search').on( 'change', function () {
				table.api().columns( 9 ).search( this.value ).draw();
			});
			$('.autocomplete').each(function(i, obj) {
				var data = $.parseJSON(obj.getAttribute("data-autocomplete"));
				var id = obj.getAttribute("id");
				if(id == 'column1_search'){
					jQuery('#column1_search').typeahead({
						source: data,
						updater:function (item) {
							table.api().columns( 1 ).search( item ).draw();
							return item;
						}
					});
				}else if(id == 'column2_search'){	
					jQuery(column2_search).typeahead({
						source: data,
						updater:function (item) {
							dataTable.api().columns( 5 ).search( item ).draw();
							return item;
						}
					});
				}else if(id == 'column3_search'){	
					jQuery('#column3_search').typeahead({
						source: data,
						updater:function (item) {
							dataTable.api().columns( 6 ).search( item ).draw();
							return item;
						}
					});
				}else if(id == 'column4_search'){	
					jQuery('#column4_search').typeahead({
						source: data,
						updater:function (item) {
							dataTable.api().columns( 9 ).search( item ).draw();
							return item;
						}
					});
				}
			});
		});
	  
    </script>       
	<!-- InstanceEndEditable -->    
    
	<!-- InstanceBeginEditable name="endcode" -->
	<!-- InstanceEndEditable -->    
</body>
<!-- InstanceEnd --></html>
<?PHP 
} ?>
