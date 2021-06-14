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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Sub Brand (Details)</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="subBrandDetailsTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Sub Brand</th>
                                <th>Price (RM)</th>
                                <th>Stock</th>
                                <th>Discount Price</th>
                                <th>Variation (Yes/No)</th>
                                <th>Shipping Method</th>
                                <th>Commission</th>
                                <th>SST</th>
                                <th>GST</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td><img :src="'/storage/app/'+item.image" alt="image"></td>
                                <td></td>
                                <td>{{item.product_type}}</td>
                                <td>{{item.brand_name}}</td>
                                <td>{{item.sub_brand_name}}</td>
                                <td>{{item.price}}</td>
                                <td>{{item.stock}}</td>
                                <td>{{item.discount_price}}</td>
                                <td></td>
                                <td>{{item.shipping}}</td>
                                <td>{{item.commission}}</td>
                                <td>{{item.sst}}</td>
                                <td>{{item.gst}}</td>
                                <td>{{item.activation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#editPostModal" data-toggle="modal" @click="editPost(item.id);">View / Edit</a>
                                    <button class="btn btn-info mt-3 mb-3">Update Shipping Method</button>
                                    <button class="btn text-white" :style="[item.activation == 1 ? {'background-color' : 'green'} : {'background-color' : 'red'}]" onclick="confirm('Confirm want to change activation?') || event.stopImmediatePropagation()" @click="activationUpdate(item.id);">Active / Deactive</button>
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
        <!-- Create Sub Brand Details Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Sub Brand (Details)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div>
                            <!-- <input type="file" id="file" ref="files" v-for="index in 6" :key="index" v-on:change="handleFileUpload (index)"/> -->
                            <input type="file" id="file" ref="file1" v-on:change="handleFileUpload"/>
                            <input type="file" id="file" ref="file2" v-on:change="handleFileUpload"/>
                            <input type="file" id="file" ref="file3" v-on:change="handleFileUpload"/>
                            <input type="file" id="file" ref="file4" v-on:change="handleFileUpload"/>
                            <input type="file" id="file" ref="file5" v-on:change="handleFileUpload"/>
                            <input type="file" id="file" ref="file6" v-on:change="handleFileUpload"/>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 mt-3">Sub Brand Name</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="sub_brand_name">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3"> Brand Name</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="brand_name">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Shop Name</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="shop_name">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Merchant</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Mall</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Product Type</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="productType" v-bind:value="1" v-model="product_type">New
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="productType" v-bind:value="0" v-model="product_type">Used
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Stock</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="stock">
                            </div>
                            <div class="col-sm-2 mt-3">Commission</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="commission">
                            </div>
                            <div class="col-sm-2 mt-3">SST</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="sst">
                            </div>
                            <div class="col-sm-2 mt-3">GST</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="gst">
                            </div>
                            <div class="col-sm-2 mt-3">Price</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="price">
                            </div>
                            <div class="col-sm-2 mt-3">Discount Price</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="discount_price">
                            </div>
                            <div class="col-sm-2 mt-3">Description</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="description"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">UOM</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="uom">
                            </div>
                            <div class="col-sm-2 mt-3">Height</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="height">
                            </div>
                            <div class="col-sm-2 mt-3">Weight</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="weight">
                            </div>
                            <div class="col-sm-2 mt-3">Fragile</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="fragile">
                            </div>
                            <div class="col-sm-2 mt-3">Shipping</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="shipping">
                            </div><hr>
                            <div class="col-sm-12 mt-5"><h5><strong>Add Variation</strong></h5></div>
                            <div class="col-sm-12" >
                                <div class="form-group" v-for="(input,k) in variations" :key="k">
                                    <select class="form-control-sm" style="width:150px" v-model="input.variation">
                                        <option value="" disabled>Variation</option>
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                    <input type="text" class="" placeholder="Attribute" v-model="input.attribute">
                                    <input type="text" class="" placeholder="Surcharge/Extra" v-model="input.surcharge">
                                    <input type="text" class="" placeholder="Stock" v-model="input.stock">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && variations.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == variations.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="activation">No
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

        <!-- Edit Sub Brand Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Sub Brand</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2 mt-3">Sub Brand Name</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="sub_brand_name">
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3"> Brand Name</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="brand_name">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Shop Name</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="shop_name">
                                        <option v-for="(shop, index) in shops" :key="index" v-bind:value="shop.id">{{ shop.shop_name }}---{{ shop.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Merchant</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="merchant">
                                        <option v-for="(merchant, index) in merchants" :key="index" v-bind:value="merchant.id">{{ merchant.merchant_name }}---{{ merchant.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Mall</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="mall">
                                        <option v-for="(mall, index) in malls" :key="index" v-bind:value="mall.id">{{ mall.mall_name }}---{{ mall.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Product Type</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="productType" v-bind:value="1" v-model="product_type">New
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="productType" v-bind:value="0" v-model="product_type">Used
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Stock</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="stock">
                            </div>
                            <div class="col-sm-2 mt-3">Commission</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="commission">
                            </div>
                            <div class="col-sm-2 mt-3">SST</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="sst">
                            </div>
                            <div class="col-sm-2 mt-3">GST</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="gst">
                            </div>
                            <div class="col-sm-2 mt-3">Price</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="price">
                            </div>
                            <div class="col-sm-2 mt-3">Discount Price</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="discount_price">
                            </div>
                            <div class="col-sm-2 mt-3">Description</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="description"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">UOM</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="uom">
                            </div>
                            <div class="col-sm-2 mt-3">Height</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="height">
                            </div>
                            <div class="col-sm-2 mt-3">Weight</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="weight">
                            </div>
                            <div class="col-sm-2 mt-3">Fragile</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="fragile">
                            </div>
                            <div class="col-sm-2 mt-3">Shipping</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="shipping">
                            </div><hr>
                            <div class="col-sm-12 mt-5"><h5><strong>Add Variation</strong></h5></div>
                            <div class="col-sm-12" >
                                <div class="form-group" v-for="(input,k) in variations" :key="k">
                                    <select class="form-control-sm" style="width:150px" v-model="input.variation">
                                        <option value="" disabled>Variation</option>
                                        <option v-for="(sub_brand, index) in sub_brands" :key="index" v-bind:value="sub_brand.id">{{ sub_brand.sub_brand }}---{{ sub_brand.id }}</option>
                                    </select>
                                    <input type="text" class="" placeholder="Attribute" v-model="input.attribute">
                                    <input type="text" class="" placeholder="Surcharge/Extra" v-model="input.surcharge">
                                    <input type="text" class="" placeholder="Stock" v-model="input.stock">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && variations.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == variations.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Activation</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="activation">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="activation">No
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
            this.fetchSubBrandDetails();
            this.fetchMerchant();
            this.fetchBrand();
            this.fetchNewShop();
            this.fetchSubBrand();
            this.fetchMall();
            // this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                sub_brands:{},
                brands:{},
                merchants:{},
                malls:{},
                shops:{},

                id: "",
                GUID:"",
                file1:"",
                file2:"",
                file3:"",
                file4:"",
                file5:"",
                file6:"",
                brand_name: "",
                sub_brand_name: "",
                shop_name:"",
                merchant:"",
                mall:"",
                product_type:"",
                stock:"",
                commission:"",
                sst:"",
                gst:"",
                price:"",
                discount_price:"",
                description:"",
                uom:"",
                height:"",
                weight:"",
                fragile:"",
                shipping:"",
                activation: "",
                variations:[
                    {
                        variation:"",
                        attribute:"",
                        surcharge:"",
                        stock:"",
                    }
                ]
            }
        },
        methods:{
            fetchSubBrandDetails(){
                axios.get('http://localhost:8000/api/sub_brand_details')
                .then(res => {
                    this.list = res.data;
                }).then(res => {
                    $("#subBrandDetailsTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
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
                            { "visible": false, "targets": 14 }
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
                    var table = $('#subBrandDetailsTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 14 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 14 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },
            add(index) {
            this.variations.push({ variation: '', attribute:'', surcharge:'', stock:'' });
            },
            remove(index) {
                this.variations.splice(index, 1);
            },
            // getResults(page = 1) {
			// axios.get('http://localhost:8000/api/floors?page=' + page)
			// 	.then(response => {
			// 		this.list = response.data;
			// 	});
            // },

            fetchBrand(){
                axios.get('http://localhost:8000/api/brands')
                .then(res => {
                    this.brands = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchSubBrand(){
                axios.get('http://localhost:8000/api/sub_brands')
                .then(res => {
                    this.sub_brands = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchMerchant(){
                axios.get('http://localhost:8000/api/merchants')
                .then(res => {
                    this.merchants = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchMall(){
                axios.get('http://localhost:8000/api/malls')
                .then(res => {
                    this.malls = res.data.data;
                }).catch(err => {console.log(err);});
            },

            fetchNewShop(){
                axios.get('http://localhost:8000/api/new_shops')
                .then(res => {
                    this.shops = res.data.data;
                    //console.log("Shop = ", this.shops );
                }).catch(err => {console.log(err);});
            },

            //Handles a change on the file upload
            handleFileUpload(res){
                //console.log(res);
                //this.files = this.$refs.files.files;
                this.file1 = this.$refs.file1.files[0];
                this.file2 = this.$refs.file2.files[0];
                this.file3 = this.$refs.file3.files[0];
                this.file4 = this.$refs.file4.files[0];
                this.file5 = this.$refs.file5.files[0];
                this.file6 = this.$refs.file6.files[0];
            },

            addPost(){
                //console.log(this.variations);
                if(this.file1 == '' || this.sub_brand_name == '' || this.brand_name == '' || this.shop_name == ''){
                    return alert("Please fill-up all the fields");
                }

                //create GUID
                var dt = new Date().getTime();
                var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = (dt + Math.random()*16)%16 | 0;
                    dt = Math.floor(dt/16);
                    return (c=='x' ? r :(r&0x3|0x8)).toString(16);
                });
                this.GUID = uuid;
                //console.log(this.GUID);

                let formData = new FormData();
                formData.append('GUID', this.GUID);

                // var i;
                // for( i = 0; i < this.files.length; i++ ){
                //     let file = this.files[i];

                //     formData.append('files[' + i + ']', file);
                //     return i;
                // }
                //console.log(i);

                formData.append('image', this.file1);
                formData.append('image1', this.file2);
                formData.append('image2', this.file3);
                formData.append('image3', this.file4);
                formData.append('image4', this.file5);
                formData.append('video', this.file6);
                formData.append('brand_name', this.brand_name);
                formData.append('sub_brand_name', this.sub_brand_name);
                formData.append('shop_name', this.shop_name);
                formData.append('merchant', this.merchant);
                formData.append('mall', this.mall);
                formData.append('product_type', this.product_type);
                formData.append('stock', this.stock)
                formData.append('commission', this.commission)
                formData.append('sst', this.sst)
                formData.append('gst', this.gst)
                formData.append('price', this.price)
                formData.append('discount_price', this.discount_price)
                formData.append('description', this.description)
                formData.append('uom', this.uom)
                formData.append('height', this.height)
                formData.append('weight', this.weight)
                formData.append('fragile', this.fragile)
                formData.append('shipping', this.shipping)
                formData.append('activation', this.activation);

                axios.post('http://localhost:8000/api/create_sub_brand_details', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    this.variations.forEach(element => {
                        //console.log(element.name);
                        axios.post('http://localhost:8000/api/create_sub_brand_detail_variation', {GUID:this.GUID, variation:element.variation, attribute:element.attribute, surcharge:element.surcharge, stock:element.stock})
                        .then(res => {
                            if(res.status == 201){
                                location.reload();
                            }
                        }).catch(err => {console.log(err);});
                    });
                }).catch(error => {console.log(error);});
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_sub_brand_detail/'+id)
                .then(res => {
                    this.id = res.data.data.id,
                    this.GUID = res.data.data.GUID;
                    this.sub_brand_name = res.data.data.sub_brand_name,
                    this.brand_name = res.data.data.brand_name,
                    this.shop_name = res.data.data.shop_name,
                    this.merchant = res.data.data.merchant,
                    this.mall = res.data.data.mall,
                    this.product_type = res.data.data.product_type,
                    this.stock = res.data.data.stock,
                    this.commission = res.data.data.commission,
                    this.sst = res.data.data.sst,
                    this.gst = res.data.data.gst,
                    this.price = res.data.data.price,
                    this.discount_price = res.data.data.discount_price,
                    this.description = res.data.data.description,
                    this.uom = res.data.data.uom,
                    this.height = res.data.data.height,
                    this.weight = res.data.data.weight,
                    this.fragile = res.data.data.fragile,
                    this.shipping = res.data.data.shipping,
                    this.activation = res.data.data.activation

                }).then(res => {
                    axios.get('http://localhost:8000/api/sub_brand_detail_variations/'+this.GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        this.variations = res.data.data;
                    }).catch(err => {console.log(err);})
                }).catch(err => {console.log(err);})
                .catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_sub_brand_detail/' + this.id, {GUID:this.GUID, sub_brand_name:this.sub_brand_name, brand_name:this.brand_name, shop_name:this.shop_name, merchant:this.merchant, mall:this.mall, product_type:this.product_type, stock:this.stock, commission:this.commission, sst:this.sst, gst:this.gst, price:this.price, discount_price:this.discount_price, description:this.description, uom:this.uom, height:this.height, weight:this.weight, fragile:this.fragile, shipping:this.shipping, activation:this.activation})
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                    }
                }).catch(err => {console.log(err);});
            },
            activationUpdate(id){
                let activationCode;
                let GUID;
                let sub_brand_name;
                let brand_name;
                let shop_name;
                let merchant;
                let mall;
                let product_type;
                let stock;
                let commission;
                let sst;
                let gst;
                let price;
                let discount_price;
                let description;
                let uom;
                let height;
                let weight;
                let fragile;
                let shipping;
                let variations = [];
                axios.get('http://localhost:8000/api/single_sub_brand_detail/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    GUID = res.data.data.GUID;
                    sub_brand_name = res.data.data.sub_brand_name;
                    brand_name = res.data.data.brand_name;
                    shop_name = res.data.data.shop_name;
                    merchant = res.data.data.merchant;
                    mall = res.data.data.mall;
                    product_type = res.data.data.product_type;
                    stock = res.data.data.stock;
                    commission = res.data.data.commission;
                    sst = res.data.data.sst;
                    gst = res.data.data.gst;
                    price = res.data.data.price;
                    discount_price = res.data.data.discount_price;
                    description = res.data.data.description;
                    uom = res.data.data.uom;
                    height = res.data.data.height;
                    weight = res.data.data.weight;
                    fragile = res.data.data.fragile;
                    shipping = res.data.data.shipping;

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
                    axios.get('http://localhost:8000/api/sub_brand_detail_variations/'+GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        variations = res.data.data;
                        //console.log("variations = ", variations);
                    }).catch(err => {console.log(err);})
                }).catch(err => {console.log(err)})
                .then(res => {
                    axios.put('http://localhost:8000/api/update_sub_brand_detail/' + id, {GUID:GUID, sub_brand_name:sub_brand_name, brand_name:brand_name, shop_name:shop_name, merchant:merchant, mall:mall, product_type:product_type, stock:stock, commission:commission, sst:sst, gst:gst, price:price, discount_price:discount_price, description:description, uom:uom, height:height, weight:weight, fragile:fragile, shipping:shipping, activation:activationCode})
                    .then(res => {
                        variations.forEach(element => {
                            //console.log(element.variation, element.GUID);
                            axios.put('http://localhost:8000/api/update_sub_brand_detail_variations/' + GUID, {GUID:GUID, variation:element.variation, attribute:element.attribute, surcharge:element.surcharge, stock:element.stock,})
                            .then(res => {
                                if(res.status == 201){
                                    location.reload();
                                }
                            }).catch(err => {console.log(err);});
                        });
                    }).catch(err => {console.log("Error = "+err);})
                }).catch(err => {console.log("Error = "+err);})
                .catch(err => {console.log("Error = "+err);})
            },
            deletePost(id){
                console.log(id);
                axios.delete('http://localhost:8000/api/sub_brand_details/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {console.log(err);});
            }
        }
    }
</script>
