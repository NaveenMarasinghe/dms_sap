<?php
// session_start();
if (isset($_SESSION["user"]) && ($_SESSION["user"]["utype"] == "1")) {
?>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>



	<ul class="nav nav-list">
		<li class="">
			<a href="../pages/dashboard.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<!-- Three level menu
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Three Level Menu
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									sub menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											next level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													last level
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-folder-open"></i>
				<span class="menu-text"> Inventory </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/products_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Products
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/product_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Stock
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>



		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Purchase Orders </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/purchase_view2.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Purchase Orders
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/purchase_create1.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Purchase Order
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-download"></i>
				<span class="menu-text"> GRN </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/grn_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View GRN
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/grn_create.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create GRN
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Route Schedule </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/route_sche_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Route Schedule
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/route_sche_create2.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Route Schedule
					</a>

					<b class="arrow"></b>
				</li>



			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Create Sales </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/sales_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_create6.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_return.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Return
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Warehouse </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="../pages/stock_issue.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Issue Stock
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/stock_receive.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Receive Stock
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Customers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/customer_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Customers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/customer_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Customer
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-hdd-o"></i>
				<span class="menu-text"> Suppliers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/suppliers_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Suppliers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/suppliers_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Supplier
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>



		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-truck"></i>
				<span class="menu-text"> Vehicles </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="../pages/vehicle_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Vehicle Stock
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/vehicle_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Vehicle
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Employees </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/employee_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Employee
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/employee_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Employee
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart-o"></i>
				<span class="menu-text"> Reports </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Purchase Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/purchase_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/purchase_report_order.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventory Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/inventory_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Inventory Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<!-- <li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Order ID
							</a>

							<b class="arrow"></b>
						</li> -->
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						GRN Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/grn_report_date.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/grn_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - GRN ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Route Schedule Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/rtsche_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/rtsche_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Schedule ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/sales_report_route.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Route
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Customer
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_month.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

			</ul>
		</li>




	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
			data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>


<?php
} else if (isset($_SESSION["user"]) && ($_SESSION["user"]["utype"] == "2")) {

?>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>



	<ul class="nav nav-list">
		<li class="">
			<a href="../pages/dashboard.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<!--  Three level menu
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Three Level Menu
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									sub menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											next level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													last level
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-folder-open"></i>
				<span class="menu-text"> Inventory </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/products_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Products
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/product_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Stock
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Create Sales </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/sales_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_create6.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_return.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Return
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>



		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Route Schedule </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/route_sche_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Route Schedule
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/route_sche_create2.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Route Schedule
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Customers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/customer_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Customers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/customer_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Customer
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart-o"></i>
				<span class="menu-text"> Reports </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Purchase Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/purchase_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/purchase_report_order.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventory Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/inventory_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Inventory Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<!-- <li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Order ID
							</a>

							<b class="arrow"></b>
						</li> -->
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						GRN Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/grn_report_date.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/grn_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - GRN ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Route Schedule Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/rtsche_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/rtsche_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Schedule ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/sales_report_route.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Route
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Customer
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_month.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

			</ul>
		</li>






	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
			data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>


<?php

} else if (isset($_SESSION["user"]) && ($_SESSION["user"]["utype"] == "3")) {

?>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">


		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="">
			<a href="../pages/dashboard.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<!--  Three level menu
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Three Level Menu
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									sub menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											next level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													last level
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-folder-open"></i>
				<span class="menu-text"> Inventory </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/products_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Products
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/product_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Stock
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Create Sales </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/sales_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_create6.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Sales
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/sales_return.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Return
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>





		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Route Schedule </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/route_sche_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Route Schedule
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Customers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/customer_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Customers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/customer_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Customer
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>




		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart-o"></i>
				<span class="menu-text"> Reports </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Purchase Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/purchase_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/purchase_report_order.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventory Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/inventory_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Inventory Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<!-- <li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Order ID
							</a>

							<b class="arrow"></b>
						</li> -->
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						GRN Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/grn_report_date.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/grn_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - GRN ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Route Schedule Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/rtsche_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/rtsche_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Schedule ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/sales_report_route.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Route
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Customer
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_month.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

			</ul>
		</li>




	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
			data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>


<?php

} else if (isset($_SESSION["user"]) && ($_SESSION["user"]["utype"] == "4")) {

?>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">


		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="">
			<a href="../pages/dashboard.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<!--  Three level menu
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Three Level Menu
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									sub menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											next level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													last level
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-folder-open"></i>
				<span class="menu-text"> Inventory </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/products_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Products
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/product_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Stock
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>



		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Purchase Orders </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/purchase_view2.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Purchase Orders
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/purchase_create1.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create Purchase Order
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-download"></i>
				<span class="menu-text"> GRN </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/grn_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View GRN
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/grn_create.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create GRN
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Route Schedule </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/route_sche_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Route Schedule
					</a>

					<b class="arrow"></b>
				</li>




			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-briefcase"></i>
				<span class="menu-text"> Customers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/customer_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Customers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/customer_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Customer
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-hdd-o"></i>
				<span class="menu-text"> Suppliers </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/suppliers_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Suppliers
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/suppliers_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Supplier
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Employees </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/employee_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Employee
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/employee_add.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add New Employee
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart-o"></i>
				<span class="menu-text"> Reports </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Purchase Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/purchase_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/purchase_report_order.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventory Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/inventory_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Inventory Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<!-- <li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Order ID
							</a>

							<b class="arrow"></b>
						</li> -->
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						GRN Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/grn_report_date.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/grn_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - GRN ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Route Schedule Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/rtsche_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/rtsche_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Schedule ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/sales_report_route.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Route
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Customer
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_month.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

			</ul>
		</li>




	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
			data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>


<?php

} else if (isset($_SESSION["user"]) && ($_SESSION["user"]["utype"] == "5")) {

?>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">


		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="">
			<a href="../pages/dashboard.php">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<!--  Three level menu
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Three Level Menu
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									sub menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											next level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													last level
												</a>

												<b class="arrow"></b>
											</li>

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-folder-open"></i>
				<span class="menu-text"> Inventory </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/products_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Products
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/product_stock.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Stock
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Purchase Orders </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/purchase_view2.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Purchase Orders
					</a>

					<b class="arrow"></b>
				</li>



			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-download"></i>
				<span class="menu-text"> GRN </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/grn_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View GRN
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="../pages/grn_create.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Create GRN
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text"> Route Schedule </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="../pages/route_sche_view.php">
						<i class="menu-icon fa fa-caret-right"></i>
						View Route Schedule
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-bar-chart-o"></i>
				<span class="menu-text"> Reports </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">


				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Purchase Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/purchase_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/purchase_report_order.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventory Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/inventory_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Inventory Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<!-- <li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Purchase Report - Order ID
							</a>

							<b class="arrow"></b>
						</li> -->
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						GRN Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/grn_report_date.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/grn_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								GRN Report - GRN ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Route Schedule Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/rtsche_report_sup.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Supplier
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/rtsche_report_id.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Route Schedule Report - Schedule ID
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Sales Report
					</a>

					<b class="arrow"></b>
					<ul class="submenu">

						<li class="">
							<a href="../reports/sales_report_route.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Route
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_cus.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Customer
							</a>

							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="../reports/sales_report_month.php">
								<i class="menu-icon fa fa-caret-right"></i>
								Sales Report - Date Range
							</a>

							<b class="arrow"></b>
						</li>
					</ul>
				</li>

			</ul>
		</li>




	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
			data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>


<?php

}
?>