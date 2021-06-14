<template>
    <div class="container mt-5">
        <div class="d-flex">
            <div class="dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Status</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" id="active" style="cursor: pointer;">Active</p>
                <p class="dropdown-item" id="deactive" style="cursor: pointer;">Deactive</p>
                <!-- <a class="dropdown-item" href="#" >Deactive</a> -->
                </div>
            </div>
            <button class="btn btn-secondary ml-2">Calendar</button>
        </div>
        <div class="d-flex justify-content-end">
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Voucher</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="voucherTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Voucher Title</th>
                                <th>Voucher By</th>
                                <th>Voucher Start Date</th>
                                <th>Voucher Expiry Date</th>
                                <th>Duration of Voucher (days)</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td>{{item.voucher_title}}</td>
                                <td>{{item.voucher_belongs_to}}</td>
                                <td>{{item.start_date}}</td>
                                <td>{{item.end_date}}</td>
                                <td></td>
                                <td>{{item.activation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#editPostModal" data-toggle="modal" @click="editPost(item.id);">View / Edit</a>
                                    <button class="btn text-white" :style="[item.activation == 1 ? {'background-color' : 'green'} : {'background-color' : 'red'}]" onclick="confirm('Confirm want to change activation?') || event.stopImmediatePropagation()" @click="activation(item.id);">Active / Deactive</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <!-- <pagination :data="list" @pagination-change-page="getResults"></pagination> -->
                </div>
            </div>
        </div>
        <!-- Add New Voucher Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Voucher</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2">Voucher Title</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.voucher_title">
                            </div>
                            <div class="col-sm-2 mt-3">Mall</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Merchant</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Shop</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.shop">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.sub_brand">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Voucher Code</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.voucher_code">
                            </div>
                            <div class="col-sm-2 mt-3">Voucher Start Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.start_date">
                            </div>
                            <div class="col-sm-2 mt-3">Voucher End Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.end_date">
                            </div>
                            <div class="col-sm-2 mt-3">Minimum Spend</div>
                            <div class="col-sm-10 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="number" class="form-control" v-model="add.min_spend">
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Discount Amount</div>
                            <div class="col-sm-10 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="number" class="form-control" v-model="add.discount_amount">
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Maximum Usage</div>
                            <div class="col-sm-10 mt-3">
                                <input type="number" class="form-control" v-model="add.maximum_usage">
                            </div>
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Voucher Belongs To</strong></h5></div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="1" v-model="add.voucher_belongs_to">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="2" v-model="add.voucher_belongs_to">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="3" v-model="add.voucher_belongs_to">By Other Mall
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="addPost()">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Voucher Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Voucher</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2">Voucher Title</div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="add.voucher_title">
                            </div>
                            <div class="col-sm-2 mt-3">Mall</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Merchant</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Shop</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.shop">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.sub_brand">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Voucher Code</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.voucher_code">
                            </div>
                            <div class="col-sm-2 mt-3">Voucher Start Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.start_date">
                            </div>
                            <div class="col-sm-2 mt-3">Voucher End Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.end_date">
                            </div>
                            <div class="col-sm-2 mt-3">Minimum Spend</div>
                            <div class="col-sm-10 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="number" id="min" name="min" min="0" max="100" class="form-control" v-model="add.min_spend">
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Discount Amount</div>
                            <div class="col-sm-10 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="number" id="discount" name="discount" min="0" max="100" class="form-control" v-model="add.discount_amount">
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Maximum Usage</div>
                            <div class="col-sm-10 mt-3">
                                <input type="number" id="max" name="max" min="0" max="100" class="form-control" v-model="add.maximum_usage">
                            </div>
                            <div class="col-sm-12 mt-5">
                                <div><h5><strong>Voucher Belongs To</strong></h5></div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="1" v-model="add.voucher_belongs_to">GSM
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="2" v-model="add.voucher_belongs_to">Merchant
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="voucher_belongs_to" v-bind:value="3" v-model="add.voucher_belongs_to">By Other Mall
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="updatePost()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.fetchVoucher();
            this.fetchNewShop();
            this.fetchMerchant();
            this.fetchSubBrand();
            this.fetchMall();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                merchants:{},
                sub_brands:{},
                shops:{},
                malls:{},
                add: {
                    id: "",
                    voucher_title: "",
                    merchant: "",
                    mall: "",
                    shop: "",
                    sub_brand: "",
                    voucher_code: "",
                    start_date: "",
                    end_date: "",
                    min_spend: "",
                    discount_amount: "",
                    maximum_usage: "",
                    //activation: "",
                    voucher_belongs_to: ""
                },
            }
        },
        methods:{
            fetchVoucher(){
                axios.get('http://localhost:8000/api/vouchers')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#voucherTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5 ]
                                }
                            },
                            {extend: 'excel', title: 'ExampleFile'},
                            {extend: 'pdf', title: 'ExampleFile'}
                        ],

                        // buttons: [
                        //     'copyHtml5',
                        //     'excelHtml5',
                        //     'csvHtml5',
                        //     'pdfHtml5'
                        // ],

                        //"buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
                        "order": [[ 0, "desc" ]],
                        "deferRender": true,
                        //"lengthMenu": [ 25, 50, 75, 100 ],
                        //"scrollX": true,
                        //"scrollY": '50vh',
                        //"scrollCollapse": true,
                        //filter onclick any data in the column
                        "columnDefs": [
                            //{ "searchable": false, "targets": 5 },
                            { "visible": false, "targets": 6 }
                        ],
                        //filter by click any column
                        // "initComplete": function () {
                        //     var api = this.api();
                        //     api.$('td').click( function () {
                        //         api.search( this.innerHTML ).draw();
                        //     } );
                        // }
                        //filter by select option for each column
                        // initComplete: function () {
                        //     this.api().columns().every( function () {
                        //         var column = this;
                        //         var select = $('<select><option value=""></option></select>')
                        //             .appendTo( $(column.footer()).empty() )
                        //             .on( 'change', function () {
                        //                 var val = $.fn.dataTable.util.escapeRegex(
                        //                     $(this).val()
                        //                 );
                        //
                        //                 column
                        //                     .search( val ? '^'+val+'$' : '', true, false )
                        //                     .draw();
                        //             } );
                        //
                        //         column.data().unique().sort().each( function ( d, j ) {
                        //             select.append( '<option value="'+d+'">'+d+'</option>' )
                        //         } );
                        //     } );
                        // }
                    });
                    var table = $('#voucherTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 6 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 6 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },
            // getResults(page = 1) {
			// axios.get('http://localhost:8000/api/floors?page=' + page)
			// 	.then(response => {
			// 		this.list = response.data;
			// 	});
            // },

            fetchMerchant(){
                axios.get('http://localhost:8000/api/merchants')
                .then(res => {
                    this.merchants = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchNewShop(){
                axios.get('http://localhost:8000/api/new_shops')
                .then(res => {
                    this.shops = res.data.data;
                    //console.log("Brand = ", this.list );
                }).catch(err => {console.log(err);});
            },

            fetchMall(){
                axios.get('http://localhost:8000/api/malls')
                .then(res => {
                    this.malls = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchSubBrand(){
                axios.get('http://localhost:8000/api/sub_brands')
                .then(res => {
                    this.sub_brands = res.data.data;
                }).catch(err => {console.log(err);});
            },

            addPost(){
                if(this.add.voucher_title == '' || this.add.voucher_code == '' || this.add.start_date == '' || this.add.end_date == '' || this.add.min_spend == '' || this.add.merchant == '' || this.add.shop == '' || this.add.mall == '' || this.add.discount_amount == '' || this.add.sub_brand == '' || this.add.maximum_usage == ''){
                    return alert("Please fill-up all the fields");
                }
                axios.post('http://localhost:8000/api/create_voucher', this.add)
                .then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {console.log(error); });
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_voucher/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.voucher_title = res.data.data.voucher_title,
                    this.add.voucher_code = res.data.data.voucher_code,
                    this.add.start_date = res.data.data.start_date,
                    this.add.end_date = res.data.data.end_date,
                    this.add.min_spend = res.data.data.min_spend,
                    this.add.merchant = res.data.data.merchant,
                    this.add.shop = res.data.data.shop,
                    this.add.mall = res.data.data.mall,
                    this.add.discount_amount = res.data.data.discount_amount,
                    this.add.sub_brand = res.data.data.sub_brand,
                    this.add.maximum_usage = res.data.data.maximum_usage,
                    //this.add.activation = res.data.data.activation,
                    this.add.voucher_belongs_to = res.data.data.voucher_belongs_to
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_voucher/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let voucher_title;
                let voucher_code;
                let start_date;
                let end_date;
                let min_spend;
                let merchant;
                let shop;
                let mall;
                let discount_amount;
                let sub_brand;
                let maximum_usage;
                let voucher_belongs_to;
                axios.get('http://localhost:8000/api/single_voucher/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    voucher_title = res.data.data.voucher_title;
                    voucher_code = res.data.data.voucher_code;
                    start_date = res.data.data.start_date;
                    end_date = res.data.data.end_date;
                    min_spend = res.data.data.min_spend;
                    mall = res.data.data.mall;
                    merchant = res.data.data.merchant;
                    shop = res.data.data.shop;
                    discount_amount = res.data.data.discount_amount;
                    sub_brand = res.data.data.sub_brand;
                    maximum_usage = res.data.data.maximum_usage;
                    voucher_belongs_to = res.data.data.voucher_belongs_to;

                    if(res.data.data.activation == 1){
                        activationCode = 0;
                        //console.log("Active Code = "+activationCode);
                    }else{
                        if(res.data.data.activation == 0){
                            activationCode = 1;
                            //console.log("Active Code = "+activationCode);
                        }
                    }
                })
                .then(res => {
                    axios.put('http://localhost:8000/api/update_voucher/' + id, {voucher_title:voucher_title, voucher_code:voucher_code, start_date:start_date, end_date:end_date, min_spend:min_spend, mall:mall, merchant:merchant, shop:shop, discount_amount:discount_amount, sub_brand:sub_brand, maximum_usage:maximum_usage, voucher_belongs_to:voucher_belongs_to, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                //alert("Successfully Deleted");
                console.log(id);
                axios.delete('http://localhost:8000/api/vouchers/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err); });
            }
        }
    }
</script>
