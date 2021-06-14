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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create New Shop</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="newShopTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Shop</th>
                                <th>Merchant</th>
                                <th>Selling Identity</th>
                                <th>Category</th>
                                <th>Floor</th>
                                <th>Mall</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.shop_name}}</td>
                                <td>{{item.merchant}}</td>
                                <td>{{item.selling_identity}}</td>
                                <td>{{item.category}}</td>
                                <td>{{item.floor}}</td>
                                <td>{{item.mall}}</td>
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
        <!-- Add New Shop Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create New Shop for GSM</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-3 mt-3">Shop</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.shop_name">
                            </div>
                            <div class="col-sm-3 mt-3">Merchant</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Brand</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Category</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-2">Floor</div>
                            <div class="col-sm-9 mt-2">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.floor">
                                        <option v-for="(floor, index) in floors" :key="index" v-bind:value="floor.id">{{ floor.floor_name }}---{{ floor.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Mall</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Selling Identity</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.selling_identity">
                                        <option v-for="(selling_identity, index) in selling_identities" :key="index" v-bind:value="selling_identity.id">{{ selling_identity.selling_identity }}---{{ selling_identity.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">City</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.city">
                                        <option>Malaysia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Free Shipping Minimum Amount</div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" v-model="add.free_shipping_min_amount">
                            </div>
                            <div class="col-sm-3 mt-3">Activation</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="freeShippingForALl" v-bind:value="1" v-model="add.free_shipping_for_all"><span><strong>Free Shipping for All Product</strong></span>
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

        <!-- Edit New Shop Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit New Shop for GSM</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3 mt-3">Shop</div>
                            <div class="col-sm-9 mt-3">
                                <input type="text" class="form-control" v-model="add.shop_name">
                            </div>
                            <div class="col-sm-3 mt-3">Merchant</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Brand</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Category</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-2">Floor</div>
                            <div class="col-sm-9 mt-2">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.floor">
                                        <option v-for="(floor, index) in floors" :key="index" v-bind:value="floor.id">{{ floor.floor_name }}---{{ floor.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Mall</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">Selling Identity</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.selling_identity">
                                        <option v-for="(selling_identity, index) in selling_identities" :key="index" v-bind:value="selling_identity.id">{{ selling_identity.selling_identity }}---{{ selling_identity.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-3">City</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.city">
                                        <option>Malaysia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">Free Shipping Minimum Amount</div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" v-model="add.free_shipping_min_amount">
                            </div>
                            <div class="col-sm-3 mt-3">Activation</div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="add.activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="add.activation">No
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-9 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" v-bind:value="1" v-model="add.free_shipping_for_all"><span><strong>Free Shipping for All Product</strong></span>
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
            this.fetchNewShop();
            this.fetchMerchant();
            this.fetchBrand();
            this.fetchCategory();
            this.fetchFloor();
            this.fetchMall();
            this.fetchSellingIdentity();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                merchants:{},
                brands:{},
                categories:{},
                floors:{},
                malls:{},
                selling_identities:{},
                add: {
                    id: "",
                    file:"",
                    shop_name: "",
                    merchant: "",
                    brand: "",
                    category: "",
                    floor: "",
                    mall:"",
                    selling_identity:"",
                    city:"",
                    free_shipping_min_amount:"",
                    free_shipping_for_all:"1",
                    activation:""
                },
            }
        },
        methods:{

            fetchNewShop(){
                axios.get('http://localhost:8000/api/new_shops')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#newShopTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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
                            { "visible": false, "targets": 8 }
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
                    var table = $('#newShopTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 8 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 8 )
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

            fetchBrand(){
                axios.get('http://localhost:8000/api/brands')
                .then(res => {
                    this.brands = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchCategory(){
                axios.get('http://localhost:8000/api/product_categories')
                .then(res => {
                    this.categories = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchFloor(){
                axios.get('http://localhost:8000/api/floors')
                .then(res => {
                    this.floors = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchMall(){
                axios.get('http://localhost:8000/api/malls')
                .then(res => {
                    this.malls = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchSellingIdentity(){
                axios.get('http://localhost:8000/api/selling_identities')
                .then(res => {
                    this.selling_identities = res.data.data;
                }).catch(err => {console.log(err);});
            },

            //Handles a change on the file upload
            handleFileUpload(){
                this.add.file = this.$refs.file.files[0];
            },

            addPost(){
                 //console.log(this.add.activation);
                 //console.log(this.add.free_shipping_for_all);
                if(this.add.file == '' || this.add.shop_name == '' || this.add.merchant == '' || this.add.brand == '' || this.add.category == '' || this.add.floor == '' || this.add.mall == '' || this.add.selling_identity == '' || this.add.city == '' || this.add.free_shipping_min_amount == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('shop_name', this.add.shop_name);
                formData.append('merchant', this.add.merchant);
                formData.append('brand', this.add.brand);
                formData.append('category', this.add.category);
                formData.append('floor', this.add.floor);
                formData.append('mall', this.add.mall);
                formData.append('selling_identity', this.add.selling_identity);
                formData.append('city', this.add.city);
                formData.append('free_shipping_min_amount', this.add.free_shipping_min_amount);
                formData.append('free_shipping_for_all', this.add.free_shipping_for_all);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_new_shop', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {console.log(error); });
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_new_shop/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.shop_name = res.data.data.shop_name,
                    this.add.merchant = res.data.data.merchant,
                    this.add.brand = res.data.data.brand,
                    this.add.category = res.data.data.category,
                    this.add.floor = res.data.data.floor,
                    this.add.mall = res.data.data.mall,
                    this.add.selling_identity = res.data.data.selling_identity,
                    this.add.city = res.data.data.city,
                    this.add.free_shipping_min_amount = res.data.data.free_shipping_min_amount,
                    this.add.free_shipping_for_all = res.data.data.free_shipping_for_all,
                    this.add.activation = res.data.data.activation
                    //this.add.floor = res.data.data.floor
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_new_shop/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let shop_name;
                let merchant;
                let brand;
                let category;
                let floor;
                let mall;
                let selling_identity;
                let city;
                let free_shipping_min_amount;
                let free_shipping_for_all;
                axios.get('http://localhost:8000/api/single_new_shop/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    shop_name = res.data.data.shop_name;
                    merchant = res.data.data.merchant;
                    brand = res.data.data.brand;
                    category = res.data.data.category;
                    floor = res.data.data.floor;
                    mall = res.data.data.mall;
                    selling_identity = res.data.data.selling_identity;
                    city = res.data.data.city;
                    free_shipping_min_amount = res.data.data.free_shipping_min_amount;
                    free_shipping_for_all = res.data.data.free_shipping_for_all;

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
                    axios.put('http://localhost:8000/api/update_new_shop/' + id, {shop_name:shop_name, merchant:merchant, brand:brand, category:category, floor:floor, mall:mall, selling_identity:selling_identity, city:city, free_shipping_min_amount:free_shipping_min_amount, free_shipping_for_all:free_shipping_for_all, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                axios.delete('http://localhost:8000/api/new_shops/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err); });
            }
        }
    }
</script>
