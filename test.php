$(".new_launch").click(function () {
            var id = $(this).attr("data-id");
    
                $.ajax({
                    type: "POST",
                    url: "library/database.php",
                    data: { get_data_from_server: id },
                    success: function (_data) {
                        console.log(_data);
                        var da = JSON.parse(_data);
                        var pCat = '';
                        var pName = '';
                        var pPrice = '';
                        var description = '';
                        var imges = [];
                        jQuery.each(da.products, function (i, da) {
                            console.log(da.product_name);
                            console.log(da.sell_Price);
                            pCat = da.category_name;
                            pName = da.product_name;
                            pPrice = da.sell_Price;
                            description = da.discriptions;
                            imges[i] = da.img_path + da.img;
                            console.log(imges[i]);
                        });
                        if (description == null) {
                            description = '*Note: Please Add Description to display.';
                        }
                        var html = '';
                        html += '<div class="row">';
                        html += '<input value="' + id + '" type = "hidden" id = "showId"><div class="col input-group mb-3"><span class="input-group-text">Category:</span>';
                        html += '<input type="text" value="' + pCat + '" class="form-control" id="catName" readonly>';
                        html += '</div><div class="col input-group mb-3" ><span class="input-group-text">Price: </span>';
                        html += '<input type="text" value="' + pPrice + '" class="form-control" id="productPrice" readonly></div>';
                        html += '<div class="col-6 input-group mb-3"><span class="input-group-text"> Product Name:</span><input type="text" value="' + pName + '" class="form-control" id="ProductName" readonly></div>';
                        html += '<div class="col-12 d-flex"><div class="col-11 form-floating mb-2"><span class="input-group-text text-center" id="basic-addon1">Product Discription'
                        html += '<textarea class="form-control ms-2" id="productDisc" style="height: 100px; width: 100%;" ; maxlength="600"> ' + description + '</textarea></span ></div >'
                        html += '<div class="col-2"><a id="discSubmit" class="btn bg-success text-white">Save <i class="bi bi-save-fill"></i></a></div></div >'
                        html += '<div class="col-12 d-flex">';
                        var count = imges.length;
                        for (var k = 1; k < count; k++) {
                            html += '<img src="../../' + imges[k] + '" id="productImg" style="width:200px">';
                            console.log(imges[k]);
                        }
                        html += '</div > ';

                        $("#show_new_launch").empty();
                        $("#show_new_launch").append(html);
                        _data = '';
                    }
                });
            }
            $("#exampleModal").modal('show');
        });