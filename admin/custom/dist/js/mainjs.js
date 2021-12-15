// import ms from "../../../assets/bower_components/moment/src/locale/ms";

function hidepanels() {
    $('#add-user-panel').addClass('hide');
    $('#view-user-panel').addClass('hide');
    $('#add-category-panel').addClass('hide');
    $('#add-subcategory-panel').addClass('hide');
    $('#update-user-panel').addClass('hide');
    $('#update-category-panel').addClass('hide');
    $('#add-product-panel').addClass('hide');
    $('#add-banner-panel').addClass('hide');
    $('#add-product-excel-panel').addClass('hide');
    $('#update-product-panel').addClass('hide');
    $('#add-product-image-panel').addClass('hide');
    $('#view-main-panel').addClass('hide');
    $('#add-notice-panel').addClass('hide');
    $('#add-gallery-panel').addClass('hide');
    $('#add-hederText-panel').addClass('hide');
    $('#add-homeabout-panel').addClass('hide');
    $('#add-aboupage-panel').addClass('hide');
    $('#add-admissionspage-panel').addClass('hide');
    $('#add-facilitypage-panel').addClass('hide');
    $('#add-hospitalpage-panel').addClass('hide');
    $('#add-affiliationpage-panel').addClass('hide');
    $('#add-courses-panel').addClass('hide');
    $('#add-feedback-panel').addClass('hide');
    $('#add-downloads-panel').addClass('hide');
    $('#add-career-panel').addClass('hide');
    $('#add-pageimg-panel').addClass('hide');
    $('#adminHomeIconSubmenu').addClass('hide');
    $('#add-distributor-registration-panel').addClass('hide');
    $('#update-distributor-registration-panel').addClass('hide');
    $('#distributor-profile-panel').addClass('hide');
    $('#add-change-password-panel').addClass('hide');
    $('#update-product-panel').addClass('hide');
    $('#add-admin-pin-panel').addClass('hide');
    $('#distributor-shopping-panel').addClass('hide');
    $('#add-distributor-registration-panel').addClass('hide');
    $('#update-bigshoppee-registration-panel').addClass('hide');
    $('#add-bigshoppee-registration-panel').addClass('hide');
    $('#add-homeshoppee-registration-panel').addClass('hide');
    $('#update-homeshoppee-registration-panel').addClass('hide');
    $('#homeshoppee-orders-panel').addClass('hide');
    $('#homeshoppee-sell-panel').addClass('hide');
    $('#admintohome-sell-panel').addClass('hide');
    $('#add-purchase-panel').addClass('hide');
    $('#update-category-panel').addClass('hide');
    $('#update-subcategory-panel').addClass('hide');
    $('#admintobig-sell-panel').addClass('hide');
    $('#view-cart-panel').addClass('hide');
    $('#view-team-panel').addClass('hide');
    $('#view-dist-wallet').addClass('hide');
    $('#view-dist-balance').addClass('hide');
    $('#add-product-bulk-panel').addClass('hide');
    $('#add-product-bulk-images-panel').addClass('hide');
    $('#userlisttable').html('');
    $('#viewlistpanel').text('');
}
function showDistributorMenu() {
    // $('#distributorHomeIconMenu').removeClass('hide');
    $('#LeftDistributorHomeMenu').removeClass('hide');
    $('#LeftDistributorRegistrationMenu').removeClass('hide');
    $('#LeftDistributorMyProfileMenu').removeClass('hide');
    $('#LeftDistributorMyGeneologyMenu').removeClass('hide');
    $('#LeftDistributorMyTeamMenu').removeClass('hide');
    $('#LeftDistributorMyIncomeMenu').removeClass('hide');
    $('#LeftDistributorMyGiftMenu').removeClass('hide');
    $('#LeftDistributorShoppingMenu').removeClass('hide');
    $('#LeftDistributorMyCartMenu').removeClass('hide');
    $('#LeftDistributorMyOrdersMenu').removeClass('hide');
    $('#LeftDistributorMyPurchaseMenu').removeClass('hide');
    $('#LeftDistributorMyWalletMenu').removeClass('hide');
    $('#LeftDistributorMyBalanceMenu').removeClass('hide');
}
function showAdminMenu() {
    // $('#adminHomeIconMenu').removeClass('hide');
    $('#LeftAdminHomeMenu').removeClass('hide');
    $('#LeftAdminProductsMenu').removeClass('hide');
    $('#LeftAdminBigshopeeMenu').removeClass('hide');
    $('#LeftAdminReportsMenu').removeClass('hide');
    $('#LeftAdminFCMenu').removeClass('hide');
    $('#LeftAdminPinMenu').removeClass('hide');
    $('#LeftAdminHomeShoppeeMenu').removeClass('hide');
    $('#LeftAdminDistributorMenu').removeClass('hide');
    $('#LeftAdminCategoryMenu').removeClass('hide');
    $('#LeftAdminMonthlyOffersMenu').removeClass('hide');
    $('#LeftAdminSellerMenu').removeClass('hide');
    // $('#LeftAdminWebOrderMenu').removeClass('hide');
}
function showBigShoppeeMenu() {
    $('#LeftBigShoppeeHomeMenu').removeClass('hide');
    $('#LeftBigShoppeeHomeshopeeMenu').removeClass('hide');
    $('#LeftBigShoppeeStockMenu').removeClass('hide');
    $('#LeftBigShoppeeSalesMenu').removeClass('hide');
    $('#LeftBigShoppeeHomeOrdersMenu').removeClass('hide');
    $('#LeftBigShoppeeShoppingMenu').removeClass('hide');
    $('#LeftBigShoppeeMyCartMenu').removeClass('hide');
    $('#LeftBigShoppeeMyOrdersMenu').removeClass('hide');
    $('#LeftBigShoppeeMyPurchaseMenu').removeClass('hide');
    $('#LeftBigshoppeeHomeOrdersSellMenu').removeClass('hide');
}
function showHomeShoppeeMenu() {
    $('#LeftHomeShoppeeHomeMenu').removeClass('hide');
    // $('#LeftHomeShoppeeRegistrationMenu').removeClass('hide');
    $('#LeftHomeShoppeeStockMenu').removeClass('hide');
    $('#LeftHomeShoppeeSalesMenu').removeClass('hide');
    $('#LeftHomeShoppeeDistOrdersMenu').removeClass('hide');
    $('#LeftHomeShoppeeShoppingMenu').removeClass('hide');
    $('#LeftHomeShoppeeMyCartMenu').removeClass('hide');
    $('#LeftHomeShoppeeMyOrdersMenu').removeClass('hide');
    $('#LeftHomeShoppeeMyPurchaseMenu').removeClass('hide');
    $('#LeftHomeShoppeeDistOrdersSellMenu').removeClass('hide');
}
var web_orders = '';
function proceed_web_order(userid) {
    $.ajax({
        method: "POST",
        url: "functions.php",
        dataType: 'json',
        data:{fid:95,userid:userid}
    })
        .done(function(msg){
            web_orders = msg.web_orders;
            Swal.fire({
                title: 'Confirm Order',
                text: '',
                html: web_orders,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                width: '80%',
                confirmButtonText: 'Confirm Order!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        dataType: 'json',
                        url: "functions.php",
                        data:{fid:96,uid:userid,seller:'admin'}
                    })
                        .done(function(msg){
                            console.log(msg);
                            if (msg.res == 1){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Order Completed...',
                                    showConfirmButton: true
                                });
                                window.open(msg.location, '_blank');
                            }
                            else if(msg.res == 2){
                                Swal.fire({
                                    icon: 'warning',
                                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                                    showConfirmButton: true
                                });
                            }
                            else if(msg.res == 3){
                                Swal.fire({
                                    icon: 'warning',
                                    title: msg.pname+' is not available in your shop',
                                    showConfirmButton: true
                                });
                            }
                        });
                }
            });
        });
}

function proceed_web_guest_order(userid) {
    $.ajax({
        method: "POST",
        url: "functions.php",
        dataType: 'json',
        data:{fid:97,userid:userid}
    })
        .done(function(msg){
            web_orders = msg.web_orders;
            Swal.fire({
                title: 'Confirm Order',
                text: '',
                html: web_orders,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                width: '80%',
                confirmButtonText: 'Confirm Order!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        dataType: 'json',
                        url: "functions.php",
                        data:{fid:98,uid:userid,seller:'admin'}
                    })
                        .done(function(msg){
                            console.log(msg);
                            if (msg.res == 1){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Order Completed...',
                                    showConfirmButton: true
                                });
                            }
                            else if(msg.res == 2){
                                Swal.fire({
                                    icon: 'warning',
                                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                                    showConfirmButton: true
                                });
                            }
                            else if(msg.res == 3){
                                Swal.fire({
                                    icon: 'warning',
                                    title: msg.pname+' is not available in your shop',
                                    showConfirmButton: true
                                });
                            }
                        });
                }
            });
        });
}

function activeHomeShoppee(cell) {
    var table=document.getElementById("homeshoppeetable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    console.log(pid);
    // inputOptions can be an object or Promise
    var inputOptions = new Promise(function(resolve) {
        resolve({
            'Active': 'Active',
            'Inactive': 'Inactive'
        });
    });

    swal.fire({
        title: 'Update Status',
        input: 'radio',
        inputOptions: inputOptions,
        inputValidator: function(result) {
            return new Promise(function(resolve, reject) {
                if (result) {
                    resolve();
                } else {
                    reject('You need to select something!');
                }
            });
        }
    }).then(function(result) {
        var selectedStatus = $('input[name=swal2-radio]:checked').val();

        $.ajax({
            method: "POST",
            url: "functions.php",
            data:{fid:63,postid:pid,selectedStatus:selectedStatus}
        })
            .done(function(msg){
                console.log(msg);
                if(msg.res = "1")
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Changed...',
                        showConfirmButton: true
                    });
                }
                else
                {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Not Updated...',
                        showConfirmButton: true
                    });
                }
            });
    });

    // $(document).on("click",".swal2-container input[name='swal2-radio']", function() {
    //     var id = $('input[name=swal2-radio]:checked').val();
    //     console.log('id: ' + id);
    // });
}

function deleteNotice(cell)
{
    var table=document.getElementById("noticetable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    console.log(pid);

                        $.ajax({
                            method: "POST",
                            url: "functions.php",
                            data:{fid:32,postid:pid}
                        })
                            .done(function(msg){
                                console.log(msg);
                                if(msg==1)
                                {
                                    var mytable= $('#noticetable').DataTable();
                                    mytable.row(row).remove().draw( false );
                                }
                                else
                                {
                                    alert('Deleting Failed. Try again later.');
                                }
                            });

}

function addReferal() {
    var dist_id = $('#add-referal-userid').val();
    var home_id = $('#add-referal-homeid').val();
    var bv = $('#add-referal-bv').val();
    var date = $('#add-referal-pdate').val();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 99,dist_id: dist_id,home_id: home_id,bv:bv,date:date}
    })
        .done(function (msg) {
            if (msg == 1){
                $.LoadingOverlay("hide");
                wal.fire({
                    icon: 'success',
                    title: 'Referral BV added Successfully...',
                    showConfirmButton: true,
                    timer: 3000
                });
                return;
            }
            else {
                wal.fire({
                    icon: 'warning',
                    title: 'Something went wrong...',
                    showConfirmButton: true,
                    timer: 3000
                });
                return;
            }
        });
}

function addToCartDistByHome() {
    var prod_code = $('#homeshoppee-sell-prodcode').val();
    var dist_id = $('#homeshoppee-sell-userid').val();
    var qty = $('#homeshoppee-sell-qty').val();
    var seller = localStorage.getItem('UID');

    if (prod_code == "" || dist_id == "" || qty == "" || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Fill all details',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 74,prod_code: prod_code,dist_id: dist_id,qty:qty,seller:seller}
    })
        .done(function (msg) {
                // console.log(msg);
                $.LoadingOverlay("hide");
                $('#homeshoppee-sell-prodcode').val('');
               if (msg.res == 2){
                   Swal.fire({
                       icon: 'warning',
                       title: 'Invalid Product Code...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
            else if (msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: 'This Product is not available in your shop...',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
               else if (msg.res == 4){
                   Swal.fire({
                       icon: 'warning',
                       title: 'Only '+msg.qty+' quantity is available in your shop...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
               else if (msg.res == 5){
                   Swal.fire({
                       icon: 'warning',
                       title: 'This Product is already added...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
               else if (msg.res == 6){
                   Swal.fire({
                       icon: 'warning',
                       title: 'Please enter valid distributor id...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
               else if (msg.res == 1){
                   Swal.fire({
                       icon: 'success',
                       title: 'Product Added...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
               //========================================

            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "viewDistOrByHome.php",
                data: {dist_id: dist_id,seller:seller}
            })
                .done(function (msg) {
                        // console.log(msg.res);
                        $('#homeshoppee-sell-orderList').removeClass('hide');
                        $('#homeshoppee-sell-processOrders').removeClass('hide');
                        $('#homeshoppee-sell-orderList').html(msg.ordertlist);
                        $('#orderttable').DataTable();

                        // $.LoadingOverlay("hide");
                    }
                );


            //============================
            }
        );

}

function addToCartHomeByAdmin() {
    var prod_code = $('#admintohome-sell-prodcode').val();
    var home_id = $('#admintohome-sell-userid').val();
    var qty = $('#admintohome-sell-qty').val();
    var seller = localStorage.getItem('UID');

    if (prod_code == "" || home_id == "" || qty == "" || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Fill all details',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    //$.LoadingOverlay("show");
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 82,prod_code: prod_code,home_id: home_id,qty:qty,seller:seller}
    })
        .done(function (msg) {
                console.log(msg);
                //$.LoadingOverlay("hide");
                $('#admintohome-sell-prodcode').val('');
                if (msg.res == 2){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Invalid Product Code...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 3){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is not available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 4){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Only '+msg.qty+' quantity is available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 5){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is already added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 6){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Please enter valid id...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                //========================================

                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "viewHomeOrByAdmin.php",
                    data: {home_id: home_id,seller:seller}
                })
                    .done(function (msg) {
                            console.log(msg.res);
                            $('#admintohome-sell-orderList').removeClass('hide');
                            $('#admintohome-sell-processOrders').removeClass('hide');
                            $('#admintohome-sell-orderList').html(msg.ordertlist);
                            $('#orderttable').DataTable();

                            //$.LoadingOverlay("hide");
                        }
                    );


                //============================
            }
        );

}

function addToCartBigByAdmin() {
    var prod_code = $('#admintobig-sell-prodcode').val();
    var big_id = $('#admintobig-sell-userid').val();
    var qty = $('#admintobig-sell-qty').val();
    var seller = localStorage.getItem('UID');

    if (prod_code == "" || big_id == "" || qty == "" || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Fill all details',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    //$.LoadingOverlay("show");
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 84,prod_code: prod_code,big_id: big_id,qty:qty,seller:seller}
    })
        .done(function (msg) {
                console.log(msg);
                //$.LoadingOverlay("hide");
                $('#admintobig-sell-prodcode').val('');
                if (msg.res == 2){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Invalid Product Code...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 3){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is not available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 4){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Only '+msg.qty+' quantity is available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 5){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is already added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 6){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Please enter valid id...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                //========================================

                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "viewBigOrByAdmin.php",
                    data: {big_id: big_id,seller:seller}
                })
                    .done(function (msg) {
                            console.log(msg.res);
                            $('#admintobig-sell-orderList').removeClass('hide');
                            $('#admintobig-sell-processOrders').removeClass('hide');
                            $('#admintobig-sell-orderList').html(msg.ordertlist);
                            $('#orderttable').DataTable();

                            //$.LoadingOverlay("hide");
                        }
                    );


                //============================
            }
        );

}

function addToCartDistByAdmin() {
    var prod_code = $('#admintoDist-sell-prodcode').val();
    var dist_id = $('#admintoDist-sell-userid').val();
    var qty = $('#admintoDist-sell-qty').val();
    var seller = localStorage.getItem('UID');

    if (prod_code == "" || dist_id == "" || qty == "" || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Fill all details',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 92,prod_code: prod_code,dist_id: dist_id,qty:qty,seller:seller}
    })
        .done(function (msg) {
                console.log(msg);
                $.LoadingOverlay("hide");
                $('#admintoDist-sell-prodcode').val('');
                if (msg.res == 2){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Invalid Product Code...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 3){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is not available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 4){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Only '+msg.qty+' quantity is available in your shop...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 5){
                    Swal.fire({
                        icon: 'warning',
                        title: 'This Product is already added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 6){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Please enter valid distributor id...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                else if (msg.res == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                //========================================

                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "viewDistOrByAdmin.php",
                    data: {dist_id: dist_id,seller:seller}
                })
                    .done(function (msg) {
                            // console.log(msg.res);
                            $('#admintoDist-sell-orderList').removeClass('hide');
                            $('#admintoDist-sell-processOrders').removeClass('hide');
                            $('#admintoDist-sell-orderList').html(msg.ordertlist);
                            $('#orderttable').DataTable();

                            // $.LoadingOverlay("hide");
                        }
                    );


                //============================
            }
        );

}

function addToCart(pid) {
    // console.log(pid);
    var qty = $("#distributor-shopping-qty"+pid).val();
    var uid = localStorage.getItem('UID');
    var usertype = localStorage.getItem('USERTYPEmlm');

    if (qty == '' || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Quantity...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 53,pid: pid,qty: qty,uid:uid,usertype:usertype}
    })
        .done(function (msg) {
                console.log(msg);
                $.LoadingOverlay("hide");
               if (msg.res == 1){
                   Swal.fire({
                       icon: 'success',
                       title: 'Product added to cart...',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
               else if (msg.res == 2){
                   Swal.fire({
                       icon: 'warning',
                       title: 'Product already in your cart',
                       showConfirmButton: false,
                       timer: 3000
                   });
               }
            }
        );
}

function processOrder() {
    // console.log('Processing Order');
    var uid = localStorage.getItem('UID');
    var usertype = localStorage.getItem('USERTYPEmlm');
    // console.log(uid+'-'+usertype);
    // return;

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:64,uid:uid,usertype:usertype}
    })
        .done(function(msg){
            console.log(msg);
            Swal.fire({
                icon: 'success',
                title: 'Your order successfully placed...',
                showConfirmButton: true
            });
            window.reload();
        });
}

function increaseCartQty(pid) {
    var qty = $("#distributor-shopping-qty"+pid).val();

    if (qty == '' || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter a Quantity...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    // console.log(++qty);
    $("#distributor-shopping-qty"+pid).val(++qty);
}

function decreaseCartQty(pid) {
    var qty = $("#distributor-shopping-qty"+pid).val();

    if (qty == '' || qty == 0){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Quantity...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    // console.log(++qty);
    $("#distributor-shopping-qty"+pid).val(--qty);
}

function deleteGallery(cell)
{
    var table=document.getElementById("gallerytable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:33,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#gallerytable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteSacnned(cell)
{
    var table=document.getElementById("scannedtable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:70,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#scannedtable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deletepageimg(cell)
{
    var table=document.getElementById("pageimgtable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:37,postid:pid}
    })
        .done(function(msg){
            console.log(msg);
            if(msg==1)
            {
                var mytable= $('#pageimgtable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function viewGeneologyDetails(cell)
{
    var table=document.getElementById("geneologytable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[1].innerHTML;
    console.log(pid);

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewGeneology.php",
        data:{uid:pid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.geneologylist);
                $('#geneologytable').DataTable();
            }
        );

}

function deleteSlider(cell)
{
    var table=document.getElementById("bannertable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:34,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#bannertable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });



}


function deleteHomeAbout(cell)
{
    var table=document.getElementById("homeaboutlisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
   // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:9,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#homeaboutlisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deletecareer(cell)
{
    var table=document.getElementById("careerlisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:40,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#careerlisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deleteaboutpage(cell)
{
    var table=document.getElementById("aboutpagelisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:12,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#aboutpagelisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deleteadmissionpage(cell)
{
    var table=document.getElementById("admissionpagelisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:15,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#admissionpagelisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deletefacilitypage(cell)
{
    var table=document.getElementById("facilitypagelisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:18,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#facilitypagelisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deletehospitalpage(cell)
{
    var table=document.getElementById("hospitalpagelisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:21,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#hospitalpagelisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}
//affiliationpage
function deleteaffiliationpage(cell)
{
    var table=document.getElementById("affiliationpagelisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:24,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#affiliationpagelisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deletecourses(cell)
{
    var table=document.getElementById("courseslisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:27,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#courseslisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}
//deletefeedback
function deletefeedback(cell)
{
    var table=document.getElementById("feedbacklisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:29,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#feedbacklisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deletedownloads(cell)
{
    var table=document.getElementById("downloadslisttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:36,postid:pid}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                var mytable= $('#downloadslisttable').DataTable();
                mytable.row(row).remove().draw( false );
            }
            else
            {
                alert('Deleting Failed. Try again later.');
            }
        });//End Delete Process

}

function deleteProduct(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:42,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#producttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteCategory(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:79,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#producttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function openUpdateCatModal(cell) {
//"update-category-panel
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    var name=table.rows[rowIndex].cells[3].innerHTML;
    //console.log(name);
    hidepanels();
    $('#update-category-panel').removeClass('hide');
    $('#update-category-id').val(pid);
    $('#update-category-name').val(name);
}

function openUpdateSubCatModal(cell) {
//"update-category-panel
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    var name=table.rows[rowIndex].cells[4].innerHTML;
    //console.log(name);
    hidepanels();
    $('#update-subcategory-panel').removeClass('hide');
    $('#update-subcategory-id').val(pid);
    $('#update-subcategory-name').val(name);
}

function deleteSubCategory(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:80,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#producttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteCart(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:66,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#producttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your cart has been removed.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteOrder(cell)
{
    var table=document.getElementById("orderttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:73,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#orderttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your order has been removed.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteBigshoppee(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:56,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#producttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteHomeshoppee(cell)
{
    var table=document.getElementById("homeshoppeetable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:60,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#homeshoppeetable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function updateProduct(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#update-product-category').html(msg.catlist);
            }
        );

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:47,postid:pid}
    })
        .done(function(msg){
            // console.log(msg);
            hidepanels();
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "functions.php",
                data: {fid : 94, catid:msg.category}
            })
                .done(function (msg) {
                        // console.log(msg);
                        $('#update-product-subcategory').html(msg.subcatlist);
                    }
                );
            $('#update-product-panel').removeClass('hide');
            $('#update-product-id').val(pid);
            $('#update-product-code').val(msg.product_code);
            $('#update-product-name').val(msg.product_name);
            $('#update-product-desc').val(msg.product_desc);
            $('#update-product-hsncode').val(msg.hsncode);
            $('#update-product-mrp').val(msg.mrp);
            $('#update-product-dp').val(msg.dp);
            $('#update-product-bv').val(msg.bv);
            $('#update-product-bsper').val(msg.bsper);
            $('#update-product-hsper').val(msg.hsper);
            $('#update-product-gst').val(msg.gst);
            $('#update-product-qty').val(msg.product_quantity);
            $('select#update-product-category').val(msg.category);
            $('select#update-product-subcategory').val(msg.subcategory);
        });

}

function updateBigshoppee(cell)
{
    var table=document.getElementById("producttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:57,postid:pid}
    })
        .done(function(msg){
            console.log(msg);
            hidepanels();
            $('#update-bigshoppee-registration-panel').removeClass('hide');
            $('#update-bigshoppee-registration-ownername').val(msg.owner);
            $('#update-bigshoppee-registration-homeshopName').val(msg.homeshop);
            $('#update-bigshoppee-registration-mobileNo').val(msg.mobile_no);
            $('#update-bigshoppee-registration-email').val(msg.email);
            $('#update-bigshoppee-registration-aadharNo').val(msg.aadhar);
            $('#update-bigshoppee-registration-panNo').val(msg.pan);
            $('#update-bigshoppee-registration-address').val(msg.address);
            $('#update-bigshoppee-registration-username').val(msg.username);
        });

}

function updateHomeshoppee(cell)
{
    var table=document.getElementById("homeshoppeetable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:61,postid:pid}
    })
        .done(function(msg){
            console.log(msg);
            hidepanels();
            $('#update-homeshoppee-registration-panel').removeClass('hide');
            $('#update-homeshoppee-registration-ownername').val(msg.owner);
            $('#update-homeshoppee-registration-homeshopName').val(msg.homeshop);
            $('#update-homeshoppee-registration-mobileNo').val(msg.mobile_no);
            $('#update-homeshoppee-registration-email').val(msg.email);
            $('#update-homeshoppee-registration-aadharNo').val(msg.aadhar);
            $('#update-homeshoppee-registration-panNo').val(msg.pan);
            $('#update-homeshoppee-registration-address').val(msg.address);
            $('#update-homeshoppee-registration-username').val(msg.username);
        });
}

function onlyNumberKey(evt) {

    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function randomStr(len, arr) {
    var ans = '';
    for (var i = len; i > 0; i--) {
        ans +=
            arr[Math.floor(Math.random() * arr.length)];
    }
    return ans;
}

function generateCaptcha() {
    var captcha = randomStr(4,'123456789');
    $('#regCaptcha').html(captcha);
}

function deleteDistributor(cell)
{
    var table=document.getElementById("disttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:46,postid:pid}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#disttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

function deleteDistReferal(cell)
{
    var table=document.getElementById("disttable");
    var row=cell.parentNode;
    var rowIndex = cell.parentNode.rowIndex;
    var pid=table.rows[rowIndex].cells[0].innerHTML;
    var bv=table.rows[rowIndex].cells[4].innerHTML;
    // console.log(pid);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "functions.php",
                data:{fid:100,postid:pid,bv:bv}
            })
                .done(function(msg){
                    console.log(msg);
                    if(msg==1)
                    {
                        var mytable= $('#disttable').DataTable();
                        mytable.row(row).remove().draw( false );
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Something went wrong...',
                            'error'
                        )
                    }
                });//End Delete Process
        }
    });

}

var fad_dist=0;
var distDropzone = new Dropzone("#add-distributor-registration-image", {
    url: 'uploaddist.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 1,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 1 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("sponsor_id", $('#add-distributor-registration-sponsorid').val());
            formData.append("dist_name", $('#add-distributor-registration-distname').val());
            formData.append("dist_mobile", $('#add-distributor-registration-mobileNo').val());
            formData.append("dist_aadhar", $('#add-distributor-registration-aadharNo').val());
            formData.append("dist_pan", $('#add-distributor-registration-panNo').val());
            formData.append("dist_address", $('#add-distributor-registration-address').val());
            formData.append("dist_email", $('#add-distributor-registration-email').val());
            formData.append("sponsor_name", $('#add-distributor-registration-sponsorName').val());
            formData.append("dist_bgroup", $('#add-distributor-registration-bgroup').val());
            formData.append("account", $('#add-distributor-registration-accNo').val());
            formData.append("bname", $('#add-distributor-registration-bname').val());
            formData.append("branch", $('#add-distributor-registration-branch').val());
            formData.append("ifsc", $('#add-distributor-registration-ifsc').val());
            formData.append("nominee_name", $('#add-distributor-registration-nomineeName').val());
            formData.append("nominee_mobile", $('#add-distributor-registration-nomineeMobile').val());
            formData.append("nominee_age", $('#add-distributor-registration-nomineeAge').val());
            formData.append("nominee_relation", $('#add-distributor-registration-nomineeRelation').val());
            formData.append("distpin", $('#add-distributor-registration-pin').val());
            formData.append("dob", $('#add-distributor-registration-dob').val());
            formData.append("distType", $('#add-distributor-registration-distType').val());
        });
        this.on("addedfile", function(file) { fad_dist=1; });
        this.on("removedfile", function(file) { fad_dist=0; });
    },


});

var fad_product=0;
var productDropzone = new Dropzone("#add-product-image", {
    url: 'uploadproducts.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 1,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 1 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("category", $('#add-product-category').val());
            formData.append("subcategory", $('#add-product-subcategory').val());
            formData.append("code", $('#add-product-code').val());
            formData.append("name", $('#add-product-name').val());
            formData.append("desc", $('#add-product-desc').val());
            formData.append("hsncode", $('#add-product-hsncode').val());
            formData.append("mrp", $('#add-product-mrp').val());
            formData.append("dp", $('#add-product-dp').val());
            formData.append("bv", $('#add-product-bv').val());
            formData.append("bsper", $('#add-product-bsper').val());
            formData.append("hsper", $('#add-product-hsper').val());
            formData.append("gst", $('#add-product-gst').val());
            formData.append("qty", $('#add-product-qty').val());
        });
        this.on("addedfile", function(file) { fad_product=1; });
        this.on("removedfile", function(file) { fad_product=0; });
    },


});

var updateProductDropzone = new Dropzone("#update-product-image", {
    url: 'updateproducts.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 1,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 1 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("category", $('#update-product-category').val());
            formData.append("code", $('#update-product-code').val());
            formData.append("name", $('#update-product-name').val());
            formData.append("desc", $('#update-product-desc').val());
            formData.append("hsncode", $('#update-product-hsncode').val());
            formData.append("mrp", $('#update-product-mrp').val());
            formData.append("dp", $('#update-product-dp').val());
            formData.append("bv", $('#update-product-bv').val());
            formData.append("bsper", $('#update-product-bsper').val());
            formData.append("hsper", $('#update-product-hsper').val());
            formData.append("gst", $('#update-product-gst').val());
        });
        this.on("addedfile", function(file) { fad_product=1; });
        this.on("removedfile", function(file) { fad_product=0; });
    },


});

var fad_update_image=0;
var updateProductImageDropzone = new Dropzone("#update-product-image-image", {
    url: 'uploadproductsImage.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 1,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 1 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("code", $('#update-product-image-name').val());
        });
        this.on("addedfile", function(file) { fad_update_image=1; });
        this.on("removedfile", function(file) { fad_update_image=0; });
    },


});

var fad_banner=0;
var bannerDropzone = new Dropzone("#add-banner-image", {
    url: 'uploadslider.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("title", $('#add-banner-title').val());
        });
        this.on("addedfile", function(file) { fad_banner=1; });
        this.on("removedfile", function(file) { fad_banner=0; });
    },


});

var fad_gallery=0;
var galleryDropzone = new Dropzone("#add-gallery-image", {
    url: 'uploadgallery.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("title", $('#add-banner-title').val());
        });
        this.on("addedfile", function(file) { fad_gallery=1; });
        this.on("removedfile", function(file) { fad_gallery=0; });
    },


});

var fad_pageimg=0;
var pageimgDropzone = new Dropzone("#add-pageimg-image", {
    url: 'uploadpageimg.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("pagename", $('#add-pageimg-pagename').val());
        });
        this.on("addedfile", function(file) { fad_pageimg=1; });
        this.on("removedfile", function(file) { fad_pageimg=0; });
    },


});

var fad_notice=0;
var noticeDropzone = new Dropzone("#add-notice-image", {
    url: 'uploadnotice.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("title", $('#add-notice-title').val());
            formData.append("desc", CKEDITOR.instances['add-notice-desc'].getData());
        });
        this.on("addedfile", function(file) { fad_notice=1; });
        this.on("removedfile", function(file) { fad_notice=0; });
    },


});

var bulkImage=0;
var bulkDropzone = new Dropzone("#add-product-bulk-images-image", {
    url: 'uploadnotice.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 50,
    parallelUploads: 50,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {

        });
        this.on("addedfile", function(file) { bulkImage=1; });
        this.on("removedfile", function(file) { bulkImage=0; });
    },


});

var fad_purchase=0;
var purchaseDropzone = new Dropzone("#add-purchase-image", {
    url: 'uploadpurchase.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("invno", $('#add-purchase-iivno').val());
            formData.append("date", $('#add-purchase-date').val());
        });
        this.on("addedfile", function(file) { fad_purchase=1; });
        this.on("removedfile", function(file) { fad_purchase=0; });
    },


});



var fad_feedback=0;
var feedbackDropzone = new Dropzone("#add-feedback-image", {
    url: 'uploadfeedback.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("title", $('#add-feedback-title').val());
            formData.append("desc", CKEDITOR.instances['add-feedback-desc'].getData());
        });
        this.on("addedfile", function(file) { fad_feedback=1; });
        this.on("removedfile", function(file) { fad_feedback=0; });
    },


});

var fad_downloads=0;
var downloadsDropzone = new Dropzone("#add-downloads-image", {
    url: 'uploaddownloads.php',
    autoProcessQueue:false,
    uploadMultiple: false,
    addRemoveLinks: true,
    maxFiles: 1,
    maxFilesize: 5,
    // acceptedFiles: "image/*",
    dictDefaultMessage: 'Click To Upload Image / Max File Size 5 MB',
    init: function() {
        console.log('init');
        this.on("maxfilesexceeded", function (file) {
            alert("No more files please!");
            this.removeFile(file);
        });
        this.on("sending", function(file, xhr, formData) {
            formData.append("title", $('#add-downloads-title').val());
        });
        this.on("addedfile", function(file) { fad_downloads=1; });
        this.on("removedfile", function(file) { fad_downloads=0; });
    },


});
//distributorHomeBtn
$('#distributorHomeBtn').click(function () {
    location.reload();
});
$('#BigShoppeeHomeBtn').click(function () {
    location.reload();
});
$('#HomeShoppeeHomeBtn').click(function () {
    location.reload();
});
$('#changePwd').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-change-password-panel').removeClass('hide');
});
$('#distributorRegistrationBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-distributor-registration-panel').removeClass('hide');
    var captcha = randomStr(4,'123456789');
    $('#regCaptcha').html(captcha);
});
$('#distributorEditProfileBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#update-distributor-registration-panel').removeClass('hide');
    var pin = $('#update-distributor-registration-pin').val();
    var uid = localStorage.getItem('UID');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:71, uid:uid}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 0){
                $('#update-distributor-registration-sponsorid').val(msg.sponsor_id);
                $('#update-distributor-registration-sponsorName').val(msg.sponsor_name);
                $('#update-distributor-registration-distname').val(msg.dist_name);
                $('#update-distributor-registration-bgroup').val(msg.bgroup);
                $('#update-distributor-registration-mobileNo').val(msg.dist_mobile);
                $('#update-distributor-registration-email').val(msg.dist_email);
                $('#update-distributor-registration-aadharNo').val(msg.dist_aadhar);
                $('#update-distributor-registration-panNo').val(msg.dist_pan);
                $('#update-distributor-registration-panNo').val(msg.dist_pan);
                $('#update-distributor-registration-address').val(msg.dist_address);
                $('#update-distributor-registration-accNo').val(msg.dist_accNo);
                $('#update-distributor-registration-bname').val(msg.dist_bank_name);
                $('#update-distributor-registration-branch').val(msg.dist_bank_branch);
                $('#update-distributor-registration-ifsc').val(msg.dist_bank_ifsc);
                $('#update-distributor-registration-nomineeName').val(msg.nominee_name);
                $('#update-distributor-registration-nomineeAge').val(msg.nominee_age);
                $('#update-distributor-registration-nomineeMobile').val(msg.nominee_mobile);
                $('#update-distributor-registration-nomineeRelation').val(msg.nominee_relation);
                $('#update-distributor-registration-regForm').removeClass('hide');
            }
            else if(msg.res == 1){
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid PIN...'
                });
            }
        });

});

$('#add-new-bigShopeeCreate').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-bigshoppee-registration-panel').removeClass('hide');
});
$('#add-new-monthlyOffers').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-monthlyOffers-panel').removeClass('hide');
});

$('#add-new-homeShopeeCreate').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-homeshoppee-registration-panel').removeClass('hide');
});

$('#distributorMyProfileBtn').click(function () {
    hidepanels();
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");
    $('#mainBody').removeClass('sidebar-open');
    var uid = localStorage.getItem('UID');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 41, uid:uid}
    })
        .done(function (msg) {
                console.log(msg);
                if (msg.res == 1){
                    $('#dist_id').html(msg.id);
                    $('#referalid').html(msg.sponsor_id);
                    $('#referalname').html(msg.sponsor_name);
                    $('#dist_name').html(msg.dist_name);
                    $('#dist_mobile').html(msg.dist_mobile);
                    $('#dist_aadhar').html(msg.dist_aadhar);
                    $('#dist_pan').html(msg.dist_pan);
                    $('#dist_address').html(msg.dist_address);
                    $('#dist_email').html(msg.dist_email);
                    $('#dist_accNo').html(msg.dist_accNo);
                    $('#dist_bname').html(msg.dist_bank_name);
                    $('#dist_branch').html(msg.dist_bank_branch);
                    $('#dist_ifsc').html(msg.dist_bank_ifsc);
                    $('#nominee_name').html(msg.nominee_name);
                    $('#nominee_age').html(msg.nominee_age);
                    $('#nominee_mobile').html(msg.nominee_mobile);
                    $('#nominee_realtion').html(msg.nominee_relation);
                    $('#myProfileImg').attr("src","backend/distributor/"+msg.photo);
                    $('#distributor-profile-panel').removeClass('hide');
                    $.LoadingOverlay("hide");
                }
            }
        );
});


$('#add-new-notice').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-notice-panel').removeClass('hide');
});
$('#add-new-purchase').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-purchase-panel').removeClass('hide');

    $('#scannedInvoiceView').html('<h3>ADDED SCANNED INVOICE</h3>');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewPurchaseScannedInvoice.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#scannedInvoiceView').append(msg.scannedlist);
                $('#scannedtable').DataTable();
            }
        );
});
$('#add-new-hederText').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-hederText-panel').removeClass('hide');
});
$('#add-new-homeabout').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-homeabout-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 8}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#add-homeabout-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.homeaboutlist);
                $('#homeaboutlisttable').DataTable();
            }
        );
});

$('#add-new-aboupage').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-aboupage-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 11}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#add-aboupage-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.aboutpagelist);
                $('#aboutpagelisttable').DataTable();
            }
        );
});

$('#add-new-career').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-career-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 38}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#add-career-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.careerlist);
                $('#careerlisttable').DataTable();
            }
        );
});

$('#add-new-admissionspage').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-admissionspage-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 13}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#add-admissionspage-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.admissionpagelist);
                $('#admissionpagelisttable').DataTable();
            }
        );
});

$('#add-new-facilitypage').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-facilitypage-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 16}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-facilitypage-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.facilitypagelist);
                $('#facilitypagelisttable').DataTable();
            }
        );
});

$('#add-new-hospitalpage').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-hospitalpage-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 19}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-hospitalpage-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.hospitalpagelist);
                $('#hospitalpagelisttable').DataTable();
            }
        );
});

$('#add-new-affiliationpage').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-affiliationpage-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 22}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-affiliationpage-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.affiliationpagelist);
                $('#affiliationpagelisttable').DataTable();
            }
        );
});

$('#add-new-courses').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-courses-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 25}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-courses-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.courseslist);
                $('#courseslisttable').DataTable();
            }
        );
});

$('#add-new-feedback').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-feedback-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 28}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-feedback-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.feedbacklist);
                $('#feedbacklisttable').DataTable();
            }
        );
});

$('#add-new-downloads').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-downloads-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid : 35}
    })
        .done(function (msg) {
                // console.log(msg.facilitypagelist);
                $('#add-downloads-list').html('<hr><h3 class="box-title">ADDED CONTENT</h3>'+msg.downloadslist);
                $('#downloadslisttable').DataTable();
            }
        );
});

$('#add-new-banner').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-banner-panel').removeClass('hide');
});

$('#add-new-slider').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-banner-panel').removeClass('hide');
});

$('#add-new-gallery').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-gallery-panel').removeClass('hide');
});

$('#add-new-galleryimg').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-gallery-panel').removeClass('hide');
});

$('#add-new-pageimg').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-pageimg-panel').removeClass('hide');

});

$('#add-new-category').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-category-panel').removeClass('hide');

});

$('#add-new-subcategory').click(function () {
    hidepanels();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#add-subcategory-category').html(msg.catlist);
            }
        );
    $('#mainBody').removeClass('sidebar-open');
    $('#add-subcategory-panel').removeClass('hide');

});

$('#add-newStock-excel').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-product-excel-panel').removeClass('hide');

});
$('#add-new-bulkProduct').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-product-bulk-panel').removeClass('hide');

});
$('#add-new-prodImg').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-product-bulk-images-panel').removeClass('hide');

});
$('#update-stock-image').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#update-product-image-panel').removeClass('hide');

});

$('#add-new-newStock').click(function () {
    hidepanels();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#add-product-category').append(msg.catlist);
            }
        );

    $('#mainBody').removeClass('sidebar-open');
    $('#add-product-panel').removeClass('hide');

});

$('#add-new-distpin').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-admin-pin-panel').removeClass('hide');

});

$('#LeftDistributorShoppingMenu').click(function () {
    hidepanels();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#distributor-shopping-cat').html(msg.catlist);
            }
        );
    $('#mainBody').removeClass('sidebar-open');
    $('#distributor-shopping-panel').removeClass('hide');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 51}
    })
        .done(function (msg) {
                // console.log(msg);
            $.LoadingOverlay("hide");
                $('#distributor-shopping-products').html(msg.prod);
            }
        );
});

$('#LeftHomeShoppeeShoppingMenu').click(function () {
    hidepanels();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#distributor-shopping-cat').html(msg.catlist);
            }
        );
    // var catname = $('#distributor-shopping-cat').val();
    // $.ajax({
    //     method: "POST",
    //     dataType: 'json',
    //     url: "functions.php",
    //     data: {fid : 81, catname:catname}
    // })
    //     .done(function (msg) {
    //             console.log(msg);
    //             $('#distributor-shopping-subcat').html(msg.subcatlist);
    //         }
    //     );
    $('#mainBody').removeClass('sidebar-open');
    $('#distributor-shopping-panel').removeClass('hide');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 51}
    })
        .done(function (msg) {
                // console.log(msg);
                $.LoadingOverlay("hide");
                $('#distributor-shopping-products').html(msg.prod);
            }
        );
});


$('#LeftBigShoppeeShoppingMenu').click(function () {
    hidepanels();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 77}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#distributor-shopping-cat').html(msg.catlist);
            }
        );
    $('#mainBody').removeClass('sidebar-open');
    $('#distributor-shopping-panel').removeClass('hide');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 51}
    })
        .done(function (msg) {
                // console.log(msg);
                $.LoadingOverlay("hide");
                $('#distributor-shopping-products').html(msg.prod);
            }
        );
});

$('#LeftDistributorMyCartMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-cart-panel').removeClass('hide');
    $('#viewCarthead').text('MY CART');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewCart.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#cartisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftHomeShoppeeMyCartMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-cart-panel').removeClass('hide');
    $('#viewCarthead').text('MY CART');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewCart.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#cartisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftBigShoppeeMyCartMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-cart-panel').removeClass('hide');
    $('#viewCarthead').text('MY CART');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewCart.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#cartisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyOrdersMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewOrder.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyPurchaseMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewPurchase.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyWalletMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    // $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-dist-wallet').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewWallet.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                console.log(msg);
                $('#wallet-section-balance').html(msg.wallet);
                // $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyBalanceMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    // $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-dist-balance').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewBalance.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                console.log(msg);
                $('#balance-section-balance').html(msg.balance);
                // $.LoadingOverlay("hide");
            }
        );
});

$('#LeftHomeShoppeeMyPurchaseMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewPurchase.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#HomeShoppeeSalesReportBtn').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SALES REPORT');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewHomeSales.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.homesaleslist);
                $('#homesalestable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#BigShoppeeSalesReportBtn').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SALES REPORT');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewBigSales.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.bigsaleslist);
                $('#bigsalestable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#add-new-reportsSales').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SALES REPORT');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewAdminSales.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.Adminsaleslist);
                $('#Adminalestable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#AdminDistributorSales').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SALES REPORT');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewDistAdminSales.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.Admindistsaleslist);
                $('#Admindistsalestable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#AdminHomeShoppeeSales').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SALES REPORT');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewHomeAdminSales.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
            $('#userlisttable').html(msg.Adminhomesaleslist);
            $('#Adminhomesalestable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftBigShoppeeMyPurchaseMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewPurchase.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftBigShoppeeMyOrdersMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewOrder.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftHomeShoppeeMyOrdersMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY ORDERS');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewOrder.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyTeamMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    // $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-team-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewMyTeam.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#view-team-panel').html(msg.team);
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyIncomeMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-team-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewMyIncome.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#view-team-panel').html(msg.team);
                $.LoadingOverlay("hide");
            }
        );
});

$('#LeftDistributorMyGiftMenu').click(function () {
    hidepanels();
    var uid = localStorage.getItem('UID');
    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-team-panel').removeClass('hide');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewGiftAwards.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#view-team-panel').html(msg.team);
                $.LoadingOverlay("hide");
            }
        );
});




$('#view-banner').click(function () {
    // console.log('hi');
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED BANNER LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewslider.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
            console.log(msg.res);
                $('#userlisttable').html(msg.bannerlist);
            $('#bannertable').DataTable();
            }
        );
});

$('#view-slider').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED BANNER LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewslider.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#userlisttable').html(msg.bannerlist);
                $('#bannertable').DataTable();
            }
        );
});

$('#view-reportsDistributorList').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('DISTRIBUTOR LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewdist.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.distlist);
                $('#disttable').DataTable();
                 $.LoadingOverlay("hide");
            }
        );
});

$('#AdminViewReferalPonitsBtn').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('REFERRAL BV');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewDistReferral.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.distlist);
                $('#disttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});


$('#seleer_list_view').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('SELEER LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "seller_list.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.distlist);
                $('#disttable').DataTable();
                 $.LoadingOverlay("hide");
            }
        );
});

$('#AdminHomeShoppeeBtn').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('HOME SHOP LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewhomeshoppeeList.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.homeshoppeelist);
                $('#homeshoppeetable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#view-category').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED CATEGORY');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewCategory.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#view-subcategory').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED SUB CATEGORY');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewSubCategory.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#add-new-stockRemove').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED STOCK LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewProduct.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#seleer_product_list_view').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('PRODUCT LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "seller_product_list.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.productlist);
                $('#producttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#HomeShoppeeStockReportBtn').click(function () {
    var uid = localStorage.getItem('UID');
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED STOCK LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewHomeStock.php",
        data : {uid:uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.homestocklist);
                $('#homestocktable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#add-new-reportsStockList').click(function () {
    var uid = localStorage.getItem('UID');
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED STOCK LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewAdminStock.php",
        data : {uid:uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.adminstocklist);
                // $('#adminstocktable').DataTable();
            $('#adminstocktable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
                $.LoadingOverlay("hide");
            }
        );
});

$('#BigShoppeeStockReportBtn').click(function () {
    var uid = localStorage.getItem('UID');
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED STOCK LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewBigStock.php",
        data : {uid:uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.bigstocklist);
                $('#bigstocktable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#HomeShoppeeDistOrdersBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#homeshoppee-orders-panel').removeClass('hide');
});
$('#HomeShoppeeDistSellBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#homeshoppee-sell-panel').removeClass('hide');
});
$('#AdminSelltoShoppeeBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#admintohome-sell-panel').removeClass('hide');
});
$('#AdminSelltoDistBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#admintoDist-sell-panel').removeClass('hide');
});
$('#AdminReferalPonitsBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#add-referal-panel').removeClass('hide');
});
$('#BigshoppeeHomeSellBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#admintohome-sell-panel').removeClass('hide');
});
$('#AdminSelltoBigShoppeeBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#admintobig-sell-panel').removeClass('hide');
});

$('#BigShoppeeHomeOrdersBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#homeshoppee-orders-panel').removeClass('hide');
});

$('#AdminBigOrdersBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#homeshoppee-orders-panel').removeClass('hide');
    $('#homeshoppee-orders-panel-title').html('BIG SHOPPEE ORDERS')
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewBigOrderAdmin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                // $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#homeshoppee-orders-products').html(msg.ordertlist);
                $('#orderttable').DataTable();
                //$.LoadingOverlay("hide");
            }
        );
});
$('#AdminHomeOrdersBtn').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#homeshoppee-orders-panel').removeClass('hide');
    $('#homeshoppee-orders-panel-title').html('HOME SHOPPEE ORDERS')
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewBigOrderAdmin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                // $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#homeshoppee-orders-products').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#dist_web_order').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('DISTRIBUTOR ORDER');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewWebDistOrByAdmin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                // $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#guest_web_order').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('GUEST ORDER');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewWebGuestOrByAdmin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                // $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#guest_web_sales').click(function () {
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('GUEST SALES');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewWebGuestSales.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                // $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#userlisttable').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#homeshoppee-orders-viewOrdersBtn').click(function () {
    $('#homeshoppee-orders-processOrders').addClass('hide');
    var uid = $('#homeshoppee-orders-userid').val();
    var usertype = localStorage.getItem('USERTYPEmlm');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewDistOrderHome.php",
        data: {uid : uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#homeshoppee-orders-processOrders').removeClass('hide');
                $('#homeshoppee-orders-products').html(msg.ordertlist);
                $('#orderttable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#homeshoppee-orders-processOrdersBtn').click(function () {
    var uid = $('#homeshoppee-orders-userid').val();
    var seller = localStorage.getItem('UID');
    var usertype = localStorage.getItem('USERTYPEmlm');
    var fid = '';
    if (usertype == 'admin'){
        fid = 67;
    }
    else if (usertype == 'homeshoppee'){
        fid = 65;
    }
    else if (usertype == 'bigshoppee'){
        fid = 69;
    }
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:fid,uid:uid,seller:seller}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Order Completed...',
                    showConfirmButton: true
                });
                var table = $('#orderttable').DataTable();
                table.clear();
                table.draw();
                window.open(msg.location, '_blank');
            }
            else if(msg.res == 2){
                Swal.fire({
                    icon: 'warning',
                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                    showConfirmButton: true
                });
            }
            else if(msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: msg.pname+' is not available in your shop',
                    showConfirmButton: true
                });
            }
        });
});

$('#homeshoppee-sell-processOrdersBtn').click(function () {
    var uid = $('#homeshoppee-sell-userid').val();
    var seller = localStorage.getItem('UID');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:65,uid:uid,seller:seller}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Order Completed...',
                    showConfirmButton: true
                });
                var table = $('#orderttable').DataTable();
                table.clear();
                table.draw();
                window.open(msg.location, '_blank');
            }
            else if(msg.res == 2){
                Swal.fire({
                    icon: 'warning',
                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                    showConfirmButton: true
                });
            }
            else if(msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: msg.pname+' is not available in your shop',
                    showConfirmButton: true
                });
            }
        });
});

$('#admintoDist-sell-processOrdersBtn').click(function () {
    var uid = $('#admintoDist-sell-userid').val();
    var seller = localStorage.getItem('UID');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:93,uid:uid,seller:seller}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Order Completed...',
                    showConfirmButton: true
                });
                window.open(msg.location, '_blank');
                var table = $('#orderttable').DataTable();
                table.clear();
                table.draw();
            }
            else if(msg.res == 2){
                Swal.fire({
                    icon: 'warning',
                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                    showConfirmButton: true
                });
            }
            else if(msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: msg.pname+' is not available in your shop',
                    showConfirmButton: true
                });
            }
        });
});

$('#admintohome-sell-processOrdersBtn').click(function () {
    var uid = $('#admintohome-sell-userid').val();
    var seller = localStorage.getItem('UID');
    var usertype = localStorage.getItem('USERTYPEmlm');
    var fid = '';
    if (usertype == 'admin'){
        fid = 83;
    }
    // else if (usertype == 'homeshoppee'){
    //     fid = 65;
    // }
    else if (usertype == 'bigshoppee'){
        fid = 69;
    }
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:83,uid:uid,seller:seller}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Order Completed...',
                    showConfirmButton: true
                });
                var table = $('#orderttable').DataTable();
                table.clear();
                table.draw();
                window.open(msg.location, '_blank');
            }
            else if(msg.res == 2){
                Swal.fire({
                    icon: 'warning',
                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                    showConfirmButton: true
                });
            }
            else if(msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: msg.pname+' is not available in your shop',
                    showConfirmButton: true
                });
            }
        });
});

$('#admintobig-sell-processOrdersBtn').click(function () {
    var uid = $('#admintobig-sell-userid').val();
    var seller = localStorage.getItem('UID');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:85,uid:uid,seller:seller}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Order Completed...',
                    showConfirmButton: true
                });
                var table = $('#orderttable').DataTable();
                table.clear();
                table.draw();
                window.open(msg.location, '_blank');
            }
            else if(msg.res == 2){
                Swal.fire({
                    icon: 'warning',
                    title: msg.prodname+ ' has only '+msg.pqty+' in stock',
                    showConfirmButton: true
                });
            }
            else if(msg.res == 3){
                Swal.fire({
                    icon: 'warning',
                    title: msg.pname+' is not available in your shop',
                    showConfirmButton: true
                });
            }
        });
});

$('#add-new-bigShopeeUpdate').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED BIG SHOPPEE LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewbigshoppee.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.productlist);
                $('#producttable').DataTable();
                 $.LoadingOverlay("hide");
            }
        );
});

$('#add-new-homeShopeeUpdate').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED HOME SHOPPEE LIST');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewhomeshoppee.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.homeshoppeelist);
                $('#homeshoppeetable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#view-new-actdistpin').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ACTIVE PIN');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewPin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.pinlist);
                $('#pinttable').DataTable();
                 $.LoadingOverlay("hide");
            }
        );
});

$('#view-new-inactdistpin').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('INACTIVE PIN');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewInactivePin.php"
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.pinlist);
                $('#inactpinttable').DataTable();
                 $.LoadingOverlay("hide");
            }
        );
});

$('#distributorMyGenologyBtn').click(function () {
    hidepanels();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('MY GENEOLOGY');

    var uid = localStorage.getItem('UID');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewGeneology.php",
        data:{uid:uid}
    })
        .done(function (msg) {
                // console.log(msg.res);
                $('#userlisttable').html(msg.geneologylist);
                $('#geneologytable').DataTable();
                $.LoadingOverlay("hide");
            }
        );
});

$('#view-gallery').click(function () {
    // console.log('hi');
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED GALLERY IMAGE');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewgallery.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#userlisttable').html(msg.gallerylist);
                $('#gallerytable').DataTable();
            }
        );
});

$('#view-galleryimg').click(function () {
    // console.log('hi');
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED GALLERY IMAGE');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewgallery.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#userlisttable').html(msg.gallerylist);
                $('#gallerytable').DataTable();
            }
        );
});

$('#view-pageimg').click(function () {
    // console.log('hi');
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED PAGE IMAGE');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewpageimg.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#userlisttable').html(msg.pageimglist);
                $('#pageimgtable').DataTable();
            }
        );
});

$('#view-notice').click(function () {
    //console.log('hi');
    hidepanels();
    $('#mainBody').removeClass('sidebar-open');
    $('#view-user-panel').removeClass('hide');
    $('#viewlistpanel').text('ADDED NOTICE');

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "viewnotice.php"
        // data: $("#add-user-form").serialize()
        // data: {test : 'test'}
    })
        .done(function (msg) {
                console.log(msg.res);
                $('#userlisttable').html(msg.noticelist);
                $('#noticetable').DataTable();
            }
        );
});

$('#update-category-btnAdd').on('click',function(e) {
    e.preventDefault();
    console.log('hi');
    var id =   $('#update-category-id').val();
    var name =   $('#update-category-name').val();
    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:87,postid:id, name:name}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                Swal.fire(
                    'Success!',
                    'Category Updated...',
                    'success'
                )
            }
            else
            {
                Swal.fire(
                    'Error!',
                    'Something went wrong...',
                    'error'
                )
            }
        });
});

$('#update-subcategory-btnAdd').on('click',function(e) {
    e.preventDefault();
    console.log('hi');
    var id =   $('#update-subcategory-id').val();
    var name =   $('#update-subcategory-name').val();
    $.ajax({
        method: "POST",
        url: "functions.php",
        data:{fid:88,postid:id, name:name}
    })
        .done(function(msg){
            //console.log(msg);
            if(msg==1)
            {
                Swal.fire(
                    'Success!',
                    'Category Updated...',
                    'success'
                )
            }
            else
            {
                Swal.fire(
                    'Error!',
                    'Something went wrong...',
                    'error'
                )
            }
        });
});

$('#update-product-image-btnAdd').on('click',function(e){
    e.preventDefault();
    if(fad_update_image === 0)
    {
        Swal.fire(
            'Warning!',
            'Please select product iamge...',
            'warning'
        )
    }
    else if($('#update-product-image-name').val() == ""){
        Swal.fire(
            'Warning!',
            'Please select product..',
            'warning'
        )
    }
    else if(fad_update_image === 1)
    {
        $('#modal-form-newsliderpost').append('<div class="message-loading-overlay"><i class="ace-icon fa fa-cog fa-spin red bigger-300"></i></div>');
        updateProductImageDropzone.processQueue();
        updateProductImageDropzone.on("success", function (file,response) {
            console.log(response);
            $('#modal-form-newsliderpost').find('.message-loading-overlay').remove();
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                Swal.fire(
                    'Success!',
                    'Image Updated...',
                    'success'
                )
                $('#update-product-image-name').val('');
            }
            updateProductImageDropzone.removeFile(file);
        });
    }
});

$('#add-banner-btnAdd').on('click',function(e){
    e.preventDefault();
    if(fad_banner === 0)
    {
        var box = bootbox.alert(' <i class="fa fa-times-circle bigger-250 red"></i><b class="red" >Image not selected.</b>');
        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
    }
    else if(fad_banner === 1)
    {
        $('#modal-form-newsliderpost').append('<div class="message-loading-overlay"><i class="ace-icon fa fa-cog fa-spin red bigger-300"></i></div>');
        bannerDropzone.processQueue();
        bannerDropzone.on("success", function (file,response) {
            console.log(response);
            $('#modal-form-newsliderpost').find('.message-loading-overlay').remove();
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Slider Post Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
//							$('#newpost-modal-category').val('');
                $('#newsliderpost-modal-title').val('');/*
                 $('#newsliderpost-modal-content').val('');*/
            }
            bannerDropzone.removeFile(file);
        });
    }
});


$('#add-gallery-btnAdd').on('click',function(e){
    e.preventDefault();
    // alert(fad_gallery);
    if(fad_gallery === 0)
    {
        var box = bootbox.alert(' <i class="fa fa-times-circle bigger-250 red"></i><b class="red" >Image not selected.</b>');
        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
    }
    else if(fad_gallery === 1)
    {
        $('#modal-form-newsliderpost').append('<div class="message-loading-overlay"><i class="ace-icon fa fa-cog fa-spin red bigger-300"></i></div>');
        galleryDropzone.processQueue();
        galleryDropzone.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Slider Post Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
//							$('#newpost-modal-category').val('');
                $('#newsliderpost-modal-title').val('');/*
                 $('#newsliderpost-modal-content').val('');*/
            }
            galleryDropzone.removeFile(file);
        });
    }
});

$('#add-pageimg-btnAdd').on('click',function(e){
    e.preventDefault();
    // alert(fad_gallery);
    if(fad_pageimg === 0)
    {
        var box = bootbox.alert(' <i class="fa fa-times-circle bigger-250 red"></i><b class="red" >Image not selected.</b>');
        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
    }
    else if(fad_pageimg === 1)
    {
        $('#modal-form-newsliderpost').append('<div class="message-loading-overlay"><i class="ace-icon fa fa-cog fa-spin red bigger-300"></i></div>');
        pageimgDropzone.processQueue();
        pageimgDropzone.on("success", function (file,response) {
            console.log(response);
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Post Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
            }
            pageimgDropzone.removeFile(file);
        });
    }
});

$('#add-product-bulk-images-btnAdd').on('click',function(e){
    e.preventDefault();
    // console.log(fad_notice);
    if(bulkImage <= 0)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Choose Images...',
            showConfirmButton: true
        });
    }
    else if(bulkImage > 0)
    {
        bulkDropzone.processQueue();
        bulkDropzone.on("success", function (file,response) {
            console.log(response);
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                Swal.fire({
                    icon: 'success',
                    title: 'File Uploaded...',
                    showConfirmButton: true
                });
            }
            bulkDropzone.removeFile(file);
        });
    }
});

$('#add-notice-btnAdd').on('click',function(e){
    e.preventDefault();
    // console.log(fad_notice);
    if(fad_notice <= 0)
    {
        var title=$('#add-notice-title').val();
        var desc = CKEDITOR.instances['add-notice-desc'].getData();
        $.ajax({

            method: "POST",
            dataType: 'json',
            url: "functions.php",
            // data: $("#add-user-form").serialize()
            data: {fid: 5,title: title,desc: desc}
        })
            .done(function (msg) {
                console.log(msg.res);
                    if (msg.res==3)
                    {
                        var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");

                    }
                    else
                    {
                        var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                    }
                }
            );
    }
    else if(fad_notice >= 1)
    {
        noticeDropzone.processQueue();
        noticeDropzone.on("success", function (file,response) {
            console.log(response);
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                $('#modal-form-gallary-title').val('');
            }
            noticeDropzone.removeFile(file);
        });
    }
});

$('#add-purchase-btnAdd').on('click',function(e){
    e.preventDefault();
    // console.log(fad_notice);
    if($('#add-purchase-iivno').val() == '')
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Invoice No',
            showConfirmButton: true
        });
    }
    else if($('#add-purchase-date').val() == '')
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Invoice No',
            showConfirmButton: true
        });
    }
    else if(fad_purchase <= 0)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Select Scan Copy of Invoice',
            showConfirmButton: true
        });
    }
    else if(fad_purchase >= 1)
    {
        purchaseDropzone.processQueue();
        purchaseDropzone.on("success", function (file,response) {
            console.log(response);
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                Swal.fire({
                    icon: 'success',
                    title: 'Invoice Uploaded...',
                    showConfirmButton: true
                });
            }
            purchaseDropzone.removeFile(file);
        });
    }
});

$('#add-hederText-btnAdd').on('click',function(e){
    e.preventDefault();
        var title=$('#add-hederText-title').val();

        $.ajax({

            method: "POST",
            dataType: 'json',
            url: "functions.php",
            // data: $("#add-user-form").serialize()
            data: {fid: 6,title: title}
        })
            .done(function (msg) {
                    console.log(msg.res);
                    if (msg.res==3)
                    {
                        var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");

                    }
                    else
                    {
                        var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                    }
                }
            );
});

$('#add-homeabout-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-homeabout-title').val();
    var desc = CKEDITOR.instances['add-homeabout-desc'].getData();
    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 7,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-homeabout-title').val('');
                    $('#add-homeabout-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-aboupage-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-aboupage-title').val();
    var desc = CKEDITOR.instances['add-aboupage-desc'].getData();

    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 10,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-aboupage-title').val('');
                    $('#add-aboupage-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-career-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-career-title').val();
    var desc = CKEDITOR.instances['add-career-desc'].getData();

    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 39,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-career-title').val('');
                    $('#add-career-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-admissionspage-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-admissionspage-title').val();
    var desc = CKEDITOR.instances['add-admissionspage-desc'].getData();
    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 14,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-admissionspage-title').val('');
                    $('#add-admissionspage-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-facilitypage-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-facilitypage-title').val();
    var desc = CKEDITOR.instances['add-facilitypage-desc'].getData();
    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 17,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-facilitypage-title').val('');
                    $('#add-facilitypage-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-hospitalpage-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-hospitalpage-title').val();
    var desc = CKEDITOR.instances['add-hospitalpage-desc'].getData();

    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 20,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-hospitalpage-title').val('');
                    $('#add-hospitalpage-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});
//affiliationpage
$('#add-affiliationpage-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-affiliationpage-title').val();
    var desc = CKEDITOR.instances['add-affiliationpage-desc'].getData();

    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 23,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-affiliationpage-title').val('');
                    $('#add-affiliationpage-desc').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-courses-btnAdd').on('click',function(e){
    e.preventDefault();
    var title=$('#add-courses-title').val();
    var desc = CKEDITOR.instances['add-courses-desc'].getData();

    $.ajax({

        method: "POST",
        dataType: 'json',
        url: "functions.php",
        // data: $("#add-user-form").serialize()
        data: {fid: 26,title: title,desc: desc}
    })
        .done(function (msg) {
                //console.log(msg.res);
                if (msg.res==3)
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Successfully Submitted..</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
                    $('#add-courses-title').val('');
                }
                else
                {
                    var box = bootbox.alert(' <i class="ace-icon fa fa-times-circle bigger-250 red"></i><b class="red" >Product Adding failed....</b>');
                    box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
                }
            }
        );
});

$('#add-feedback-btnAdd').on('click',function(e){
    e.preventDefault();
    if(fad_feedback === 0)
    {
        var box = bootbox.alert(' <i class="fa fa-times-circle bigger-250 red"></i><b class="red" >Image not selected.</b>');
        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
    }
    else if(fad_feedback === 1)
    {
        feedbackDropzone.processQueue();
        feedbackDropzone.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Slider Post Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
            }
            feedbackDropzone.removeFile(file);
        });
    }
});

$('#add-downloads-btnAdd').on('click',function(e){
    e.preventDefault();
    if(fad_downloads=== 0)
    {
        var box = bootbox.alert(' <i class="fa fa-times-circle bigger-250 red"></i><b class="red" >File not selected.</b>');
        box.find(".btn-primary").removeClass("btn-primary").addClass("btn-warning");
    }
    else if(fad_downloads === 1)
    {
        downloadsDropzone.processQueue();
        downloadsDropzone.on("success", function (file,response) {
            console.log(response);
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                var box = bootbox.alert(' <i class="ace-icon fa fa-info-circle bigger-250 green"></i><b class="green" >Slider Post Successfully Submitted..</b>');
                box.find(".btn-primary").removeClass("btn-primary").addClass("btn-success");
            }
            downloadsDropzone.removeFile(file);
        });
    }
});

$('#add-distributor-registration-btnAdd').on('click',function(e){
    e.preventDefault();

    var distPhone = $('#add-distributor-registration-mobileNo').val();
    var distEmail = $('#add-distributor-registration-email').val();
    var distAdhar = $('#add-distributor-registration-aadharNo').val();
    var distPan = $('#add-distributor-registration-panNo').val();
    var distpin = $('#add-distributor-registration-pin').val();
    var dob = $('#add-distributor-registration-dob').val();
    var distType = $('#add-distributor-registration-distType').val();
    if(dob == ''){
        Swal.fire({
                    icon: 'warning',
                    title: 'Please enter you DOB',
                    showConfirmButton: true
                });
                return;
    }

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 45, distPhone: distPhone,distEmail: distEmail,distAdhar: distAdhar,distPan: distPan,distpin: distpin}
    })
        .done(function (msg) {
                // console.log(msg);return;
                if (msg.res == 0){
                    Swal.fire({
                        icon: 'warning',
                        title: msg.msg,
                        showConfirmButton: true
                    });
                    return;
                }
            }
        );

    if($('#add-distributor-registration-sponsorid').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter a Valid Sponsor ID...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-sponsorName').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter  Sponsor Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-distname').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Distributor Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-mobileNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Mobile No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-address').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Address...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-nomineeName').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Nominee Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-nomineeMobile').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Nominee Mobile No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-nomineeAge').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Nominee Age...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-nomineeRelation').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Nominee Relation...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if(fad_dist === 0)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Choose Distributor Image...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-ageCheckBox').prop("checked") == false){

        Swal.fire({
            icon: 'warning',
            title: 'Please Verify whether you are 18 or not...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-termsCheckBox').prop("checked") == false){

        Swal.fire({
            icon: 'warning',
            title: 'Please Check terms and condition checkbox....',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-captcha').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Verification Code...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-distributor-registration-captcha').val() != $('#regCaptcha').html())
    {
        Swal.fire({
            icon: 'warning',
            title: 'Verification Code not matched...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if(fad_dist === 1)
    {
        distDropzone.processQueue();
        distDropzone.on("success", function (file,response) {
            // console.log(response);
            Swal.fire({
                icon: 'success',
                title: response,
                showConfirmButton: true
            });
             $('#add-distributor-registration-sponsorid').val('');
            $('#add-distributor-registration-distname').val('');
            $('#add-distributor-registration-mobileNo').val('');
            $('#add-distributor-registration-aadharNo').val('');
            $('#add-distributor-registration-panNo').val('');
            $('#add-distributor-registration-address').val('');
            $('#add-distributor-registration-email').val('');
            $('#add-distributor-registration-sponsorName').val('');
            $('#add-distributor-registration-bgroup').val('');
            $('#add-distributor-registration-accNo').val('');
            $('#add-distributor-registration-bname').val('');
            $('#add-distributor-registration-branch').val('');
            $('#add-distributor-registration-ifsc').val('');
            $('#add-distributor-registration-nomineeName').val('');
            $('#add-distributor-registration-nomineeMobile').val('');
            $('#add-distributor-registration-nomineeAge').val('');
            $('#add-distributor-registration-nomineeRelation').val('');
            $('#add-distributor-registration-captcha').val('');
            $('#add-distributor-registration-ageCheckBox').prop("checked",false);
            $('#add-distributor-registration-termsCheckBox').prop("checked",false);
            $('#add-distributor-registration-regForm').addClass('hide');
            generateCaptcha();

            distDropzone.removeFile(file);
        });
    }
});

$('#update-distributor-registration-btnAdd').on('click',function(e) {
    e.preventDefault();
    var uid = localStorage.getItem('UID');
    var distPhone = $('#update-distributor-registration-mobileNo').val();
    var distEmail = $('#update-distributor-registration-email').val();
    var distAdhar = $('#update-distributor-registration-aadharNo').val();
    var distPan = $('#update-distributor-registration-panNo').val();

    var distName = $('#update-distributor-registration-distname').val();
    var bgroup = $('#update-distributor-registration-bgroup').val();
    var address = $('#update-distributor-registration-address').val();

    var accNo = $('#update-distributor-registration-accNo').val();
    var bname = $('#update-distributor-registration-bname').val();
    var branch = $('#update-distributor-registration-branch').val();
    var ifsc = $('#update-distributor-registration-ifsc').val();

    var nomineeName = $('#update-distributor-registration-nomineeName').val();
    var nomineeMobile = $('#update-distributor-registration-nomineeMobile').val();
    var nomineeAge = $('#update-distributor-registration-nomineeAge').val();
    var nomineeRelation = $('#update-distributor-registration-nomineeRelation').val();

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 72,uid:uid, distPhone: distPhone,distEmail: distEmail,distAdhar: distAdhar,distPan: distPan,distName:distName,bgroup:bgroup,address:address,accNo:accNo,bname:bname,branch:branch,ifsc:ifsc,nomineeName:nomineeName,nomineeMobile:nomineeMobile,nomineeAge:nomineeAge,nomineeRelation:nomineeRelation}
    })
        .done(function (msg) {
                // console.log(msg);
            Swal.fire({
                icon: 'success',
                title: 'Your Profile has been updated',
                showConfirmButton: true
            });
            }
        );
});

$('#add-bigshoppee-registration-btnAdd').on('click',function(e){
    e.preventDefault();

    var mobile = $('#add-bigshoppee-registration-mobileNo').val();
    var email = $('#add-bigshoppee-registration-email').val();
    var aadhar = $('#add-bigshoppee-registration-aadharNo').val();
    var pan = $('#add-bigshoppee-registration-panNo').val();


    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 54, mobile: mobile,email: email,aadhar: aadhar,pan: pan}
    })
        .done(function (msg) {
                console.log(msg);
                if (msg.email != 0 || msg.email != ''){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Someone is already registered with this email.',
                        showConfirmButton: true
                    });
                }
           else if (msg.phone != 0 || msg.phone != ''){
                Swal.fire({
                    icon: 'warning',
                    title: 'Someone is already registered with this mobile no.',
                    showConfirmButton: true
                });
            }
                else if (msg.pan != 0 || msg.pan != ''){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Someone is already registered with this PAN no.',
                        showConfirmButton: true
                    });
                }
                else if (msg.aadhar != 0 || msg.aadhar != ''){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Someone is already registered with this aadhar no.',
                        showConfirmButton: true
                    });
                }
            }
        );

    if($('#add-bigshoppee-registration-ownername').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Owner Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-homeshopName').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter  Home Shop Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-mobileNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Mobile No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-email').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Email...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-aadharNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Aadhar No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-panNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter PAN No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-address').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Address...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-bigshoppee-registration-bname').val() == "" || $('#add-bigshoppee-registration-branch').val() == "" || $('#add-bigshoppee-registration-accNo').val() == "" || $('#add-bigshoppee-registration-ifsc').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Bank Details...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else
    {
        var owner = $('#add-bigshoppee-registration-ownername').val();
        var homeshop = $('#add-bigshoppee-registration-homeshopName').val();
        var address = $('#add-bigshoppee-registration-address').val();
        var bank = $('#add-bigshoppee-registration-bname').val();
        var branch = $('#add-bigshoppee-registration-branch').val();
        var accNo = $('#add-bigshoppee-registration-accNo').val();
        var ifsc = $('#add-bigshoppee-registration-ifsc').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:55, owner:owner, homeshop:homeshop, mobile:mobile, email:email, aadhar:aadhar, pan:pan, address:address, bank:bank, branch:branch, accNo:accNo, ifsc:ifsc}
        })
            .done(function(msg){
                // var allpin = msg.pins.replace(/,\s*$/, "");
                // console.log(msg);
                Swal.fire({
                    icon: 'success',
                    title: 'Big Shoppee created successfully...'+msg.det,
                    showConfirmButton: true
                });
            });
    }
});

$('#add-homeshoppee-registration-btnAdd').on('click',function(e){
    e.preventDefault();

    var mobile = $('#add-homeshoppee-registration-mobileNo').val();
    var email = $('#add-homeshoppee-registration-email').val();
    var aadhar = $('#add-homeshoppee-registration-aadharNo').val();
    var pan = $('#add-homeshoppee-registration-panNo').val();


    if($('#add-homeshoppee-registration-ownername').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Owner Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-homeshopName').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter  Home Shop Name...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-mobileNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Mobile No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-email').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Email...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-aadharNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Aadhar No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-panNo').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter PAN No...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-address').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Address...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else if($('#add-homeshoppee-registration-bname').val() == "" || $('#add-homeshoppee-registration-branch').val() == "" || $('#add-homeshoppee-registration-accNo').val() == "" || $('#add-homeshoppee-registration-ifsc').val() == "")
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Bank Details...',
            showConfirmButton: false,
            timer: 3000
        });
        return;
    }
    else
    {
        var owner = $('#add-homeshoppee-registration-ownername').val();
        var homeshop = $('#add-homeshoppee-registration-homeshopName').val();
        var address = $('#add-homeshoppee-registration-address').val();
        var bank = $('#add-homeshoppee-registration-bname').val();
        var branch = $('#add-homeshoppee-registration-branch').val();
        var accNo = $('#add-homeshoppee-registration-accNo').val();
        var ifsc = $('#add-homeshoppee-registration-ifsc').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:59, owner:owner, homeshop:homeshop, mobile:mobile, email:email, aadhar:aadhar, pan:pan, address:address, bank:bank, branch:branch, accNo:accNo, ifsc:ifsc}
        })
            .done(function(msg){
                // var allpin = msg.pins.replace(/,\s*$/, "");
                // console.log(msg);
                Swal.fire({
                    icon: 'success',
                    title: 'Home Shoppee created successfully...'+msg.det,
                    showConfirmButton: true
                });
            });
    }
});

$('#add-category-btnAdd').on('click',function (e) {
    var  catname = $('#add-category-name').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:76, catname:catname}
    })
        .done(function(msg){
            console.log(msg);
            Swal.fire({
                icon: 'success',
                title: 'Category added...',
                showConfirmButton: false,
                timer: 3000
            });
            $('#add-category-name').val('');
        });

});

$('#add-subcategory-btnAdd').on('click',function (e) {
    var  catname = $('#add-subcategory-category').val();
    var  subcat = $('#add-subcategory-name').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:78, catname:catname, subcat:subcat}
    })
        .done(function(msg){
            // console.log(msg);
            Swal.fire({
                icon: 'success',
                title: 'Sub Category added...',
                showConfirmButton: false,
                timer: 3000
            });
            $('#add-subcategory-name').val('');
        });

});

$('#add-admin-pin-generate').on('click',function (e) {
    var qty = $('#add-admin-pin-qty').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:49, qty:qty}
    })
        .done(function(msg){
            // var allpin = msg.pins.replace(/,\s*$/, "");
            // console.log(msg);
            Swal.fire({
                icon: 'success',
                title: 'Pin generated successfully...',
                showConfirmButton: false,
                timer: 3000
            });
        });
});

$('#add-monthlyOffers-btnAdd').on('click',function (e) {
    var  month = $('#add-monthlyOffers-month').val();
    var desc = CKEDITOR.instances['add-monthlyOffers-desc'].getData();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:86, month:month, desc:desc}
    })
        .done(function(msg){
            console.log(msg);
            if(msg.res == 1){
                Swal.fire({
                    icon: 'success',
                    title: 'Offer Added...',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong...',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });

});

$('#add-distributor-registration-validate-pin').on('click',function (e) {
    var pin = $('#add-distributor-registration-pin').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:50, pin:pin}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 0){
                $('#add-distributor-registration-btnAdd').removeAttr("disabled");
            }
            else if(msg.res == 1){
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid PIN...'
                });
                $('#add-distributor-registration-btnAdd').attr('disabled', 'disabled');
            }
        });
});

$('#update-distributor-registration-validate-pin').on('click',function (e) {
    var pin = $('#update-distributor-registration-pin').val();
    var uid = localStorage.getItem('UID');
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:71, pin:pin,uid:uid}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 0){
                $('#update-distributor-registration-sponsorid').val(msg.sponsor_id);
                $('#update-distributor-registration-sponsorName').val(msg.sponsor_name);
                $('#update-distributor-registration-distname').val(msg.dist_name);
                $('#update-distributor-registration-bgroup').val(msg.bgroup);
                $('#update-distributor-registration-mobileNo').val(msg.dist_mobile);
                $('#update-distributor-registration-email').val(msg.dist_email);
                $('#update-distributor-registration-aadharNo').val(msg.dist_aadhar);
                $('#update-distributor-registration-panNo').val(msg.dist_pan);
                $('#update-distributor-registration-panNo').val(msg.dist_pan);
                $('#update-distributor-registration-address').val(msg.dist_address);
                $('#update-distributor-registration-accNo').val(msg.dist_accNo);
                $('#update-distributor-registration-bname').val(msg.dist_bank_name);
                $('#update-distributor-registration-branch').val(msg.dist_bank_branch);
                $('#update-distributor-registration-ifsc').val(msg.dist_bank_ifsc);
                $('#update-distributor-registration-nomineeName').val(msg.nominee_name);
                $('#update-distributor-registration-nomineeAge').val(msg.nominee_age);
                $('#update-distributor-registration-nomineeMobile').val(msg.nominee_mobile);
                $('#update-distributor-registration-nomineeRelation').val(msg.nominee_relation);
                $('#update-distributor-registration-regForm').removeClass('hide');
            }
            else if(msg.res == 1){
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid PIN...'
                });
            }
        });
});

$('#add-product-btnAdd').on('click',function(e){
    e.preventDefault();
    if ($('#add-product-category').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Select Product Category...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-category').focus();
        return;
    }
    else if ($('#add-product-code').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Code...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-code').focus();
        return;
    }
    else if ($('#add-product-name').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Name...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-name').focus();
        return;
    }
    // else if ($('#add-product-desc').val() == ""){
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Please Enter Product Description...',
    //         type: 'warning',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     $('#add-product-desc').focus();
    //     return;
    // }
    else if ($('#add-product-hsncode').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter HSN Code...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-hsncode').focus();
        return;
    }
    else if ($('#add-product-mrp').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter MRP...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-mrp').focus();
        return;
    }
    else if ($('#add-product-dp').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter DP...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-dp').focus();
        return;
    }
    else if ($('#add-product-bv').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter BV...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-bv').focus();
        return;
    }
    // else if ($('#add-product-bsper').val() == ""){
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Please Enter Big Shop %...',
    //         type: 'warning',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     $('#add-product-bsper').focus();
    //     return;
    // }
    // else if ($('#add-product-hsper').val() == ""){
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Please Enter Home Shop %...',
    //         type: 'warning',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     $('#add-product-hsper').focus();
    //     return;
    // }
    else if ($('#add-product-gst').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter GST...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-gst').focus();
        return;
    }
    else if ($('#add-product-qty').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Quantity...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-product-gst').focus();
        return;
    }
    else if(fad_product === 0)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Please Select Product Image...',
            showConfirmButton: false,
            timer: 3000
        });
    }
    else if(fad_product === 1)
    {
        productDropzone.processQueue();
        productDropzone.on("success", function (file,response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: 'Product Added Successfully...',
                showConfirmButton: false,
                timer: 3000
            });
            productDropzone.removeFile(file);

            $('#add-product-code').val('');
            $('#add-product-name').val('');
            $('#add-product-desc').val('');
            $('#add-product-hsncode').val('');
            $('#add-product-mrp').val('');
            $('#add-product-dp').val('');
            $('#add-product-bv').val('');
            $('#add-product-bsper').val('');
            $('#add-product-hsper').val('');
            $('#add-product-gst').val('');
            $('#add-product-qty').val('');
        });
    }
});

$('#update-product-btnAdd').on('click',function(e){
    e.preventDefault();
    if ($('#update-product-category').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Select Product Category...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-category').focus();
        return;
    }
    else if ($('#update-product-subcategory').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Select Product Sub Category...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-subcategory').focus();
        return;
    }
    else if ($('#update-product-code').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Code...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-code').focus();
        return;
    }
    else if ($('#update-product-name').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Name...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-name').focus();
        return;
    }
    else if ($('#update-product-hsncode').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter HSN Code...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-hsncode').focus();
        return;
    }
    else if ($('#update-product-mrp').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter MRP...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-mrp').focus();
        return;
    }
    else if ($('#update-product-dp').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter DP...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-dp').focus();
        return;
    }
    else if ($('#update-product-bv').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter BV...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-bv').focus();
        return;
    }
    // else if ($('#update-product-bsper').val() == ""){
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Please Enter Big Shop %...',
    //         type: 'warning',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     $('#update-product-bsper').focus();
    //     return;
    // }
    // else if ($('#update-product-hsper').val() == ""){
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Please Enter Home Shop %...',
    //         type: 'warning',
    //         showConfirmButton: false,
    //         timer: 3000
    //     });
    //     $('#update-product-hsper').focus();
    //     return;
    // }
    else if ($('#update-product-gst').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter GST...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-gst').focus();
        return;
    }
    else if ($('#update-product-gst').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter GST...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-gst').focus();
        return;
    }
    else if ($('#update-product-qty').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Product Quantity...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#update-product-qty').focus();
        return;
    }

    var id = $('#update-product-id').val();
    var cat = $('#update-product-category').val();
    var desc = $('#update-product-desc').val();
    var hsn = $('#update-product-hsncode').val();
    var mrp = $('#update-product-mrp').val();
    var dp = $('#update-product-dp').val();
    var bv = $('#update-product-bv').val();
    var bsper = $('#update-product-bsper').val();
    var hsper = $('#update-product-hsper').val();
    var gst = $('#update-product-gst').val();
    var qty = $('#update-product-qty').val();
    var name = $('#update-product-name').val();
    var pcode = $('#update-product-code').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:48, id:id, cat:cat, desc:desc, hsn:hsn, mrp:mrp, dp:dp, bv:bv, bsper:bsper, hsper:hsper, gst:gst, qty:qty,name:name,pcode:pcode}
        })
            .done(function(msg){
                console.log(msg);
                if (msg == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Updated Successfully...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
});

$('#update-bigshoppee-registration-btnAdd').on('click',function(e){
    e.preventDefault();

    var mobile = $('#update-bigshoppee-registration-mobileNo').val();
    var email = $('#update-bigshoppee-registration-email').val();
    var aadhar = $('#update-bigshoppee-registration-aadharNo').val();
    var pan = $('#update-bigshoppee-registration-panNo').val();
    var owner = $('#update-bigshoppee-registration-ownername').val();
    var homeshop = $('#update-bigshoppee-registration-homeshopName').val();
    var address = $('#update-bigshoppee-registration-address').val();
    var username = $('#update-bigshoppee-registration-username').val();

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:58, username:username, owner:owner, homeshop:homeshop, mobile:mobile, address:address}
        })
            .done(function(msg){
                console.log(msg);
                if (msg.res == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Big Shoppee Updated Successfully...',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
});

$('#update-homeshoppee-registration-btnAdd').on('click',function(e){
    e.preventDefault();

    var mobile = $('#update-homeshoppee-registration-mobileNo').val();
    var email = $('#update-homeshoppee-registration-email').val();
    var aadhar = $('#update-homeshoppee-registration-aadharNo').val();
    var pan = $('#update-homeshoppee-registration-panNo').val();
    var owner = $('#update-homeshoppee-registration-ownername').val();
    var homeshop = $('#update-homeshoppee-registration-homeshopName').val();
    var address = $('#update-homeshoppee-registration-address').val();
    var username = $('#update-homeshoppee-registration-username').val();

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:62, username:username, owner:owner, homeshop:homeshop, mobile:mobile, address:address}
    })
        .done(function(msg){
            console.log(msg);
            if (msg.res == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Big Shoppee Updated Successfully...',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
});

$('#add-change-password-btnVerifyUname').on('click',function(e){
    e.preventDefault();
    if ($('#add-change-password-uname').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Your Username...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-change-password-uname').focus();
        return;
    }
    var uid = localStorage.getItem('UID');
    var uname = $('#add-change-password-uname').val();
    if (uid == uname){
        Swal.fire({
            icon: 'success',
            title: 'Username Verified',
            type: 'success',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-change-password-pwdSection').removeClass('hide');
    }
    else {
        Swal.fire({
            icon: 'warning',
            title: 'Username is wrong...',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
    }
});

$('#add-change-password-btnUpdate').on('click',function(e){
    e.preventDefault();
    if ($('#add-change-password-newpwd').val() == ""){
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter New Password..',
            type: 'warning',
            showConfirmButton: false,
            timer: 3000
        });
        $('#add-change-password-newpwd').focus();
        return;
    }
    var uname = $('#add-change-password-uname').val();
    var newpadd = $('#add-change-password-newpwd').val();

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid:44,uname:uname,newpadd:newpadd}
    })
        .done(function (msg) {
            //console.log(msg.res);
            Swal.fire({
                icon: 'success',
                title: 'Password Changed Successfully',
                type: 'success',
                showConfirmButton: false,
                timer: 3000
            });
            localStorage.clear();
            window.location = "index.html";
            }
        );


});

$('#distributor-shopping-viewprod').on('click',function(e) {
    e.preventDefault();
    var cat = $('#distributor-shopping-cat').val();
    var subcat = $('#distributor-shopping-subcat').val();

    $.LoadingOverlaySetup({
        background      : "rgba(0, 0, 0, 0.5)",
        image           : "https://media.giphy.com/media/MDrmyLuEV8XFOe7lU6/giphy.gif",
        imageAnimation  : "1.5s fadein",
        imageColor      : "#ffcc00"
    });
    $.LoadingOverlay("show");

    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 52,cat: cat, subcat:subcat}
    })
        .done(function (msg) {
                console.log(msg);
                $.LoadingOverlay("hide");
                $('#distributor-shopping-products').html(msg.prod);
            }
        );
});

$('#adminHomeIconPanel').on('click',function (e) {
    console.log('hello admin Home');
    $('#adminHomeIconSubmenu').removeClass('hide');
    $('#adminHomeIconMenu').addClass('hide');
});

$('#panelBackBtn').on('click',function () {
    location.reload();
});

$('.treeview').on('click',function (e) {
    e.preventDefault();
    // console.log('menuclicked');
    // $('#mainBody').removeClass('sidebar-open');
});
$('#add-distributor-registration-sponsorid').on("change",function (e) {
    e.preventDefault();
    var sponsor_id = $('#add-distributor-registration-sponsorid').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 43, sponsor_id:sponsor_id}
    })
        .done(function (msg) {
            $('#add-distributor-registration-sponsorName').val(msg.sponsor_name);
            }
        );
});
$('#admintobig-sell-userid').on("change",function (e) {
    e.preventDefault();
    var user_id = $('#admintobig-sell-userid').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 89, user_id:user_id}
    })
        .done(function (msg) {
                if (msg.res == 1){
                    $('#admintobig-sell-name').html('Name : '+msg.name);
                    $('#admintobig-sell-address').html('Address : '+msg.address);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ivalid User Id',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#admintobig-sell-userid').val('');
                    $('#admintobig-sell-name').html('');
                    $('#admintobig-sell-address').html('');
                }
            }
        );
});

$('#admintohome-sell-userid').on("change",function (e) {
    e.preventDefault();
    var user_id = $('#admintohome-sell-userid').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 90, user_id:user_id}
    })
        .done(function (msg) {
                if (msg.res == 1){
                    $('#admintohome-sell-name').html('Name : '+msg.name);
                    $('#admintohome-sell-address').html('Address : '+msg.address);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ivalid User Id',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#admintohome-sell-userid').val('');
                    $('#admintohome-sell-name').html('');
                    $('#admintohome-sell-address').html('');
                }
            }
        );
});

$('#admintoDist-sell-userid').on("change",function (e) {
    e.preventDefault();
    var user_id = $('#admintoDist-sell-userid').val();
    console.log(user_id);
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 91, user_id:user_id}
    })
        .done(function (msg) {
            console.log(msg);
                if (msg.res == 1){
                    $('#admintoDist-sell-name').html('Name : '+msg.name);
                    $('#admintoDist-sell-address').html('Address : '+msg.address);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ivalid User Id',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $('#admintoDist-sell-userid').val('');
                    $('#admintoDist-sell-name').html('');
                    $('#admintoDist-sell-address').html('');
                }
            }
        );
});

$('#add-referal-userid').on("change",function (e) {
    e.preventDefault();
    var user_id = $('#add-referal-userid').val();
    console.log(user_id);
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 91, user_id:user_id}
    })
        .done(function (msg) {
                // console.log(msg);
                if (msg.res == 1){
                    $('#add-referal-name').html('Name : '+msg.name);
                    $('#add-referal-address').html('Address : '+msg.address);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ivalid User Id',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        );
});

$('#add-referal-homeid').on("change",function (e) {
    e.preventDefault();
    var user_id = $('#add-referal-homeid').val();
    console.log(user_id);
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 90, user_id:user_id}
    })
        .done(function (msg) {
                // console.log(msg);
                if (msg.res == 1){
                    $('#add-referal-hname').html('Name : '+msg.name);
                    $('#add-referal-haddress').html('Address : '+msg.address);
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ivalid User Id',
                        type: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        );
});

$('#add-admin-pin-userid').on("change",function (e) {
    e.preventDefault();
    var sponsor_id = $('#add-admin-pin-userid').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data:{fid: 43, sponsor_id:sponsor_id}
    })
        .done(function (msg) {
                $('#add-admin-pin-Name').val(msg.sponsor_name);
            }
        );
});

$('#add-product-category').on("change",function (e) {
    e.preventDefault();
    var catname = $('#add-product-category').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 81, catname:catname}
    })
        .done(function (msg) {
                console.log(msg);
                $('#add-product-subcategory').html(msg.subcatlist);
            }
        );
});
$('#update-product-category').on("change",function (e) {
    e.preventDefault();
    var catname = $('#update-product-category').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 81, catname:catname}
    })
        .done(function (msg) {
                console.log(msg);
                $('#update-product-subcategory').html(msg.subcatlist);
            }
        );
});

$('#add-distributor-registration-pin').on("change",function (e) {
    e.preventDefault();
    $('#add-distributor-registration-regForm').addClass('hide');
});

$('#distributor-shopping-cat').on("change",function (e) {
    e.preventDefault();
    var catname = $('#distributor-shopping-cat').val();
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 81, catname:catname}
    })
        .done(function (msg) {
                console.log(msg);
                $('#distributor-shopping-subcat').html(msg.subcatlist);
            }
        );
});
$(window).ready(function () {
    var usertype = localStorage.getItem('USERTYPEmlm');
    var uid = localStorage.getItem('UID');
    // console.log('uid : '+uid);
    // console.log(randomStr(8,'123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'));
    if (usertype == 'admin'){
        showAdminMenu();
    }
    else if (usertype == 'dist'){
        showDistributorMenu();
    }
    else if (usertype == 'bigshoppee'){
        showBigShoppeeMenu();
    }
    else if (usertype == 'homeshoppee'){
        showHomeShoppeeMenu();
    }
    $.ajax({
        method: "POST",
        dataType: 'json',
        url: "functions.php",
        data: {fid : 75}
    })
        .done(function (msg) {
                // console.log(msg);
                $('#homeshoppee-sell-prodcode').append(msg.prodlist);
            }
        );

    // Excel Product Upload
    $('#upload_form').on('submit', function(event){

        event.preventDefault();
        $.ajax({
            url:"upload.php",
            method:"POST",
            data:new FormData(this),
            dataType:'json',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data)
            {
                if(data.error != '')
                {
                    $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
                }
                else
                {
                    $('#process_area').html(data.output);
                    $('#upload_area').css('display', 'none');
                }
            }
        });

    });

    var total_selection = 0;

    var first_name = 0;

    var last_name = 0;

    var email = 0;

    var column_data = [];

    $(document).on('change', '.set_column_data', function(){

        var column_name = $(this).val();

        var column_number = $(this).data('column_number');

        if(column_name in column_data)
        {
            alert('You have already define '+column_name+ ' column');

            $(this).val('');

            return false;
        }

        if(column_name != '')
        {
            column_data[column_name] = column_number;
        }
        else
        {
            const entries = Object.entries(column_data);

            for(const [key, value] of entries)
            {
                if(value == column_number)
                {
                    delete column_data[key];
                }
            }
        }

        total_selection = Object.keys(column_data).length;

        if(total_selection == 11)
        {
            $('#import').attr('disabled', false);

            pcode = column_data.pcode;

            pname = column_data.pname;

            hsn = column_data.hsn;
            gst = column_data.gst;
            mrp = column_data.mrp;
            dpp = column_data.dpp;
            bv = column_data.bv;
            qty = column_data.qty;
            catname = column_data.catname;
            subcat = column_data.subcat;
            imgname = column_data.imgname;
        }
        else
        {
            $('#import').attr('disabled', 'disabled');
        }

    });

    $(document).on('click', '#import', function(event){

        event.preventDefault();

        $.ajax({
            url:"import.php",
            method:"POST",
            data:{pcode:pcode, pname:pname, hsn:hsn, gst:gst, mrp:mrp, dpp:dpp,bv:bv, qty:qty, catname:catname, subcat:subcat, imgname:imgname},
            beforeSend:function(){
                $('#import').attr('disabled', 'disabled');
                $('#import').text('Importing...');
            },
            success:function(data)
            {
                $('#import').attr('disabled', false);
                $('#import').text('Import');
                $('#process_area').css('display', 'none');
                $('#upload_area').css('display', 'block');
                $('#upload_form')[0].reset();
                $('#message').html("<div class='alert alert-success'>"+data+"</div>");
            }
        })

    });
    // Excel Product Upload
});
