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
            <div class="dropdown ml-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Sub Brand</button>
                <div class="dropdown-menu">
                <p class="dropdown-item" style="cursor: pointer;" v-for='(sub_brand,index) in uniqSubBrand' :key='index' @click='filterSubBrand(sub_brand.sub_brand)'>{{sub_brand.sub_brand}}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#addPostModal">Create Sub Brand</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="subBrandTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Sub Brand</th>
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
                                <td>{{item.sub_brand}}</td>
                                <td>{{item.merchant}}</td>
                                <td>{{item.shop}}</td>
                                <td>{{item.activation}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#editPostModal" data-toggle="modal" @click="editPost(item.id);">View / Edit</a>
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
        <!-- Create Sub Brand Modal -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create Sub Brand</h4>
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
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" name="" id="" v-model="sub_brand">
                            </div>
                            <div class="col-sm-2 mt-3"> Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Category</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">Add Variation</div>
                            <div class="col-sm-12" >
                                <div class="form-group" v-for="(input,k) in variation" :key="k">
                                    <input type="text" class="" v-model="input.name">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && variation.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == variation.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="col-sm-2">Description</div>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" v-model="add.description"></textarea>
                            </div> -->
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
                            <div class="col-sm-2 mt-3">Sub Brand</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" name="" id="" v-model="sub_brand">
                            </div>
                            <div class="col-sm-2 mt-3"> Brand</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="brand">
                                        <option v-for="(brand, index) in brands" :key="index" v-bind:value="brand.id">{{ brand.brand }}---{{ brand.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">Category</div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" v-model="category">
                                        <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id">{{ category.category }}---{{ category.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">Add Variation</div>
                            <div class="col-sm-12" >
                                <div class="form-group" v-for="(input,k) in variation" :key="k">
                                    <input type="text" class="" v-model="input.name">
                                    <span>
                                        <button class="btn btn-danger" @click="remove(k)" v-show="k || ( !k && variation.length > 1)">-</button>
                                        <button class="btn btn-success" @click="add(k)" v-show="k == variation.length-1">+</button>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="col-sm-2">Description</div>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" v-model="add.description"></textarea>
                            </div> -->
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
            this.fetchSubBrand();
            this.fetchCategory();
            this.fetchBrand();
            // this.getResults(); //pagination result
        },
        data(){
            return {
                list:{},
                uniqCategory:null,
                uniqProduct:null,
                uniqBrand:null,
                uniqSubBrand:null,
                GUID:"",
                file1:"",
                file2:"",
                file3:"",
                file4:"",
                file5:"",
                file6:"",
                categories:{},
                brands:{},
                id: "",
                category: "",
                brand: "",
                sub_brand: "",
                //description:"",
                activation: "",
                variation:[
                    {
                        name:""
                    }
                ]
            }
        },
        methods:{

            fetchSubBrand(){
                axios.get('http://localhost:8000/api/sub_brands')
                .then(res => {
                    this.list = res.data;

                    //remove duplicates from the list array
                    let duplicates = this.list.data;
                    this.uniqCategory = _.uniqBy(duplicates, 'category');
                    this.uniqProduct = _.uniqBy(duplicates, 'product');
                    this.uniqBrand = _.uniqBy(duplicates, 'brand');
                    this.uniqSubBrand = _.uniqBy(duplicates, 'sub_brand');
                }).then(res => {
                    $("#subBrandTable").DataTable({
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
                    var table = $('#subBrandTable').DataTable();
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
            filterCategory(categoryName){
                var table = $('#subBrandTable').DataTable();
                table.column( 2 ).search(categoryName).draw();
            },
            filterProduct(productName){
                var table = $('#subBrandTable').DataTable();
                table.column( 3 ).search(productName).draw();
            },
            filterBrand(brandName){
                var table = $('#subBrandTable').DataTable();
                table.column( 4 ).search(brandName).draw();
            },
            filterBrand(subBrandName){
                var table = $('#subBrandTable').DataTable();
                table.column( 5 ).search(subBrandName).draw();
            },

            add(index) {
            this.variation.push({ name: '' });
            },
            remove(index) {
                this.variation.splice(index, 1);
            },
            // getResults(page = 1) {
			// axios.get('http://localhost:8000/api/floors?page=' + page)
			// 	.then(response => {
			// 		this.list = response.data;
			// 	});
            // },

            fetchCategory(){
                axios.get('http://localhost:8000/api/product_categories')
                .then(res => {
                    this.categories = res.data.data;
                }).catch(err => {
                    console.log(err);
                });
            },

            fetchBrand(){
                axios.get('http://localhost:8000/api/brands')
                .then(res => {
                    this.brands = res.data.data;
                }).catch(err => {
                    console.log(err);
                });
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

                if(this.file1 == '' || this.category == '' || this.brand == '' || this.sub_brand == ''){
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
                formData.append('category', this.category);
                //formData.append('product', this.product);
                formData.append('brand', this.brand);
                formData.append('sub_brand', this.sub_brand);
                //formData.append('merchant', this.merchant);
                //formData.append('shop', this.shop);
                formData.append('activation', this.activation);

                axios.post('http://localhost:8000/api/create_sub_brand', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    this.variation.forEach(element => {
                        //console.log(element.name);
                        axios.post('http://localhost:8000/api/create_sub_brand_variation', {GUID:this.GUID, name:element.name})
                        .then(res => {
                            if(res.status == 201){
                                location.reload();
                            }
                        }).catch(err => {console.log(err);});
                    });
                }).catch(error => {console.log(error);});
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_sub_brand/'+id)
                .then(res => {
                    //console.log(res.data.data.GUID);
                    this.id = res.data.data.id,
                    this.GUID = res.data.data.GUID;
                    this.category = res.data.data.category,
                    this.brand = res.data.data.brand,
                    this.sub_brand = res.data.data.sub_brand,
                    this.activation = res.data.data.activation

                }).then(res => {
                    axios.get('http://localhost:8000/api/sub_brand_variations/'+this.GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        this.variation = res.data.data;
                    }).catch(err => {console.log(err);})
                }).catch(err => {console.log(err);})
                .catch(error => {console.log(error);});
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_sub_brand/' + this.id, {GUID:this.GUID, category:this.category, product:this.product, brand:this.brand, sub_brand:this.sub_brand, merchant:this.merchant, shop:this.shop, activation:this.activation})
                .then(res => {
                    this.variation.forEach(element => {
                        console.log(element.name, element.GUID);
                        axios.put('http://localhost:8000/api/update_sub_brand_variations/' + this.GUID, {name:element.name})
                        .then(res => {
                            if(res.status == 201){
                                location.reload();
                            }
                        }).catch(err => {console.log(err);});
                    });
                }).catch(err => {console.log(err);});
            },
            activationUpdate(id){
                let activationCode;
                let GUID;
                let category;
                let product;
                let brand;
                let sub_brand;
                let merchant;
                let shop;
                let variation = [];
                axios.get('http://localhost:8000/api/single_sub_brand/'+id)
                .then(res => {
                    //console.log("Response = "+res.data.data.activation);
                    GUID = res.data.data.GUID;
                    category = res.data.data.category;
                    product = res.data.data.product;
                    brand = res.data.data.brand;
                    sub_brand = res.data.data.sub_brand;
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
                    axios.get('http://localhost:8000/api/sub_brand_variations/'+GUID)
                    .then(res => {
                        //console.log(res.data.data);
                        variation = res.data.data;
                        console.log("variation = ", variation);
                    }).catch(err => {console.log(err);})
                }).catch(err => {console.log(err)})
                .then(res => {
                    axios.put('http://localhost:8000/api/update_sub_brand/' + id, {GUID:GUID, category:category, product:product, brand:brand, sub_brand:sub_brand, merchant:merchant, shop:shop, activation:activationCode})
                    .then(res => {
                        variation.forEach(element => {
                            console.log(element.name, element.GUID);
                            axios.put('http://localhost:8000/api/update_sub_brand_variations/' + GUID, {GUID:GUID, name:element.name})
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
                axios.delete('http://localhost:8000/api/sub_brands/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
