// javascipt for datatable

jQuery(function($){


var myTable = 
$('#productTable')
//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable( {
  bAutoWidth: false,
  "aoColumns": [
    null, null,null, null, null,
    { "bSortable": false }
  ],
  "aaSorting": [],
  
  
  //"bProcessing": true,
      //"bServerSide": true,
      //"sAjaxSource": "http://127.0.0.1/table.php" ,

  //,
  //"sScrollY": "200px",
  //"bPaginate": false,

  //"sScrollX": "100%",
  //"sScrollXInner": "120%",
  //"bScrollCollapse": true,
  //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
  //you may want to wrap the table inside a "div.dataTables_borderWrap" element

  //"iDisplayLength": 50


  select: {
    style: 'multi'
  }
  } );
});
// 

function pdf() {

var arr = $('#stockTable').tableToJSON({
});
var dataArray = [];
// var body = dataArray;

// var arr = $.parseJSON(tbldt);

// alert(arr);
$.each(arr, function (index, value) {
    dataArray.push([value["batchid"], value["productname"],value["Quantity"],value["itemcost"],value["itemmrp"] ]);
});
var body = dataArray;
alert(body);
var head = [
    ["Batch ID", "Product Name", "Quantity", "Item Cost", "Item MRP"]
];

// ];


const doc = new jsPDF('p', 'pt', 'a4', {
    filters: ['ASCIIHexEncode']
});
var mydata = "gg";
// Simple data example

// doc.addImage(imgData, 'JPEG',15, 10, 80, 80);
//             // doc.setFontSize(30);
//             // doc.text(100, 55, "CP/WIL/ Maraka Secondary School");
//             // doc.setLineWidth(1.5);
//             // doc.line(20, 105, 585, 105);
// doc.addImage(imgData, 'JPEG',255, 10, 80, 80);
doc.setFont('times')
doc.setFontSize(26);
doc.text(200, 50, "S.A.P. Distributors");
// doc.addFileToVFS('../fonts/fm_abhay.ttf', Malithy);
// doc.addFont('../fonts/fm_abhay.ttf', 'malithi', 'normal');
// doc.setFont('malithi'); // set font
doc.setFontSize(20);
doc.text(245, 80, "Stock Report");
doc.setFontSize(15);
doc.text(67, 105, "udrl - ud;f,a");
// doc.setFontSize(12);
// doc.text(67, 125, "ÿrl;k wxlh ");
doc.setFont('times');
doc.setFontSize(15);
doc.text(407, 105, "Maraka - Mathale");
// doc.setFontSize(12);
// doc.text(67, 140, "Telephone ");
// doc.setFontSize(30);
// doc.text(135, 140, " }");
// doc.setFont('malithi');
// doc.setFontSize(12);
// doc.text(407, 125, "Èkh ");
// doc.setFont('times');
// doc.setFontSize(12);
// doc.text(407, 140, "Date ");
// doc.setFontSize(12);
// doc.text(467, 130, "2019.11.25 ");
// doc.setFontSize(30);
// doc.text(440, 140, " }");
doc.setFontSize(12);
// doc.text(40, 185, "Year : 2019");
// doc.setFontSize(12);
// doc.text(120, 185, "Term : 2nd Term ");
// doc.setFontSize(12);
// doc.text(220, 185, "Grade : GRADE_09 ");
// doc.setFontSize(12);
// doc.text(360, 185, "Class : C ");
// doc.setFontSize(12);
// doc.text(380, 185, "Class :  A");
doc.setLineWidth(1.5);
doc.line(20, 150, 585, 150);

// doc.setFontSize(20);
// doc.setFontType("normal");
// doc.text(235, 225, 'Progress Report');

// doc.setLineWidth(1);
// doc.line(230, 230, 370, 230);

// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(160, 243, "04121/00021 ");
// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(340, 243, " A.W.D.Kumarasiri");
// doc.rect(45, 225, 250, 25);
// doc.rect(295, 225, 250, 25);

// doc.setFontSize(12);
// doc.setFontType("bold");
// doc.text(180, 268, "Year :");
// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(360, 268, " 2019");
// doc.rect(45, 250, 250, 25);
// doc.rect(295, 250, 250, 25);

// doc.setFontSize(12);
// doc.setFontType("bold");
// doc.text(180, 293, "Term :");
// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(360, 293, " 2nd");
// doc.rect(45, 275, 250, 25);
// doc.rect(295, 275, 250, 25);

// doc.setFontSize(12);
// doc.setFontType("bold");
// doc.text(180, 318, "Grade :");
// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(360, 318, " GRADE_09");
// doc.rect(45, 300, 250, 25);
// doc.rect(295, 300, 250, 25);

// doc.setFontSize(12);
// doc.setFontType("bold");
// doc.text(180, 343, "Class :");
// doc.setFontSize(12);
// doc.setFontType("normal");
// doc.text(360, 343, " C");
// doc.rect(45, 325, 250, 25);
// doc.rect(295, 325, 250, 25);

doc.autoTable({
        head: head,
        body: body,
        margin: {
            top: 220
        },
        lineWidth: 0.1
    },

);



var string = doc.output('datauristring');
var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
var x = window.open();
x.document.open();
x.document.write(embed);
x.document.close();


// }
// });



}

$("#mySelect2").select2("val", "0");

$dataArray[0]["poid"] = $poId;
    $dataArray[0]["status"] = 2;

    echo json_encode($dataArray);
    
var recData = JSON.parse(data);
var poId = (recData[0].poid);
var postatus = (recData[0].status);



var rtscheSupplier = $("#rtscheSupplier").val();
					var rtscheTerritory = $("#rtscheTerritory").val();
					var rtscheRoute = $("#rtscheRoute").val();
					var rtscheDate = $("#rtscheDate").val();
					var rtscheRemarks = $("#rtscheRemarks").val();
					var selectSalesman = $("#selectSalesman").val();
					var selectDriver = $("#selectDriver").val();
					var selectVehicle = $("#selectVehicle").val();


					$.post("../controllers/controller_routeSche.php?type=routeScheSave", {
							rtscheSupplier: rtscheSupplier,
							rtscheTerritory: rtscheTerritory,
							rtscheRoute: rtscheRoute,
							rtscheDate: rtscheDate,
							rtscheRemarks:rtscheRemarks,
							selectSalesman:selectSalesman,
							selectDriver:selectDriver,
							selectVehicle:selectVehicle