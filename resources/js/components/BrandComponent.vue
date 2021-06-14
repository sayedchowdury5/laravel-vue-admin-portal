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
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Category</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(category,index) in uniqCategory' :key='index' @click='filterCategory(category.category)'>{{category.category}}</p>
                </div>
            </div>
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Product</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(product,index) in uniqProduct' :key='index' @click='filterProduct(product.product)'>{{product.product}}</p>
                </div>
            </div>
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Brand</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(brand,index) in uniqBrand' :key='index' @click='filterBrand(brand.brand)'>{{brand.brand}}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Brand</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="brandTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Merchant</th>
                                <th>Shop</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td>{{item.category}}</td>
                                <td>{{item.product}}</td>
                                <td>{{item.brand}}</td>
                                <td>{{item.merchant}}</td>
                                <td>{{item.shop}}</td>
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
        <!-- Add New Brand Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Brand</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2 mt-3">Brand</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.brand">
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
                            <div class="col-sm-2 mt-3">Category</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Product</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.product">
                                        <option v-for="(product, index) in products" :key="index" v-bind:value="product.id">{{ product.product_name }}---{{ product.id }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-sm-2 mt-3">Floor</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.floor">
                                        <option v-for="(floor, index) in floors" :key="index" v-bind:value="floor.id">{{ floor.floor_name }}---{{ floor.id }}</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
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

        <!-- Edit Brand Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Brand</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2 mt-3">Brand</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.brand">
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
                            <div class="col-sm-2 mt-3">Category</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Product</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.product">
                                        <option v-for="(product, index) in products" :key="index" v-bind:value="product.id">{{ product.product_name }}---{{ product.id }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-sm-2 mt-3">Floor</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.floor">
                                        <option v-for="(floor, index) in floors" :key="index" v-bind:value="floor.id">{{ floor.floor_name }}---{{ floor.id }}</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
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
            this.fetchBrand();
            this.fetchMerchant();
            this.fetchFloor();
            this.fetchCategory();
            this.fetchProduct();
            this.fetchNewShop();
            //this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                merchants:{},
                floors:{},
                categories:{},
                products:{},
                shops:{},
                uniqCategory:null,
                uniqProduct:null,
                uniqBrand:null,
                add: {
                    id: "",
                    file:"",
                    category: "",
                    product: "",
                    brand: "",
                    shop: "",
                    merchant: "",
                    //floor:"",
                    activation:""
                },
            }
        },
        methods:{
            fetchBrand(){
                axios.get('http://localhost:8000/api/brands')
                .then(res => {
                    this.list = res.data;

                    //remove duplicates from the list array
                    let duplicates = this.list.data;
                    this.uniqCategory = _.uniqBy(duplicates, 'category');
                    this.uniqProduct = _.uniqBy(duplicates, 'product');
                    this.uniqBrand = _.uniqBy(duplicates, 'brand');
                }).then(res => {
                    $("#brandTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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
                            { "visible": false, "targets": 7 }
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
                    var table = $('#brandTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 7 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 7 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },
            filterCategory(categoryName){
                var table = $('#brandTable').DataTable();
                table.column( 2 ).search(categoryName).draw();
            },
            filterProduct(productName){
                var table = $('#brandTable').DataTable();
                table.column( 3 ).search(productName).draw();
            },
            filterBrand(brandName){
                var table = $('#brandTable').DataTable();
                table.column( 4 ).search(brandName).draw();
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

            fetchFloor(){
                axios.get('http://localhost:8000/api/floors')
                .then(res => {
                    this.floors = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchCategory(){
                axios.get('http://localhost:8000/api/product_categories')
                .then(res => {
                    this.categories = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchProduct(){
                axios.get('http://localhost:8000/api/products')
                .then(res => {
                    this.products = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchNewShop(){
                axios.get('http://localhost:8000/api/new_shops')
                .then(res => {
                    this.shops = res.data.data;
                }).catch(err => {console.log(err);});
            },

            //Handles a change on the file upload
            handleFileUpload(){
                this.add.file = this.$refs.file.files[0];
            },

            addPost(){
                if(this.add.file == '' || this.add.category == '' || this.add.product == '' || this.add.brand == '' || this.add.merchant == '' || this.add.shop == ''){
                    return alert("Please fill-up all the fields");
                }

                let formData = new FormData();
                formData.append('image', this.add.file);
                formData.append('category', this.add.category);
                formData.append('product', this.add.product);
                formData.append('brand', this.add.brand);
                formData.append('merchant', this.add.merchant);
                formData.append('shop', this.add.shop);
                formData.append('activation', this.add.activation);

                axios.post('http://localhost:8000/api/create_brand', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    if(res.status == 201){
                        location.reload();
                    }
                }).catch(error => {console.log(error);});
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_brand/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.category = res.data.data.category,
                    this.add.product = res.data.data.product,
                    this.add.brand = res.data.data.brand,
                    this.add.merchant = res.data.data.merchant,
                    this.add.shop = res.data.data.shop,
                    this.add.activation = res.data.data.activation
                    //this.add.floor = res.data.data.floor
                }).catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_brand/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activation(id){
                let activationCode;
                let category;
                let product;
                let brand;
                let merchant;
                let shop;
                axios.get('http://localhost:8000/api/single_brand/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                     category = res.data.data.category;
                     product = res.data.data.product;
                     brand = res.data.data.brand;
                     merchant = res.data.data.merchant;
                     shop = res.data.data.shop;
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
                    axios.put('http://localhost:8000/api/update_brand/' + id, {category:category, product:product, brand:brand, merchant:merchant, shop:shop, activation: activationCode}).then(res => {location.reload();}).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                axios.delete('http://localhost:8000/api/brands/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
