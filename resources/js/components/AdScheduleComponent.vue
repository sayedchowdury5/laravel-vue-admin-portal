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
            <Button class="btn btn-success mb-5" data-toggle="modal" data-target="#createAdScheduleModal">Create AD.Schedule</Button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="adScheduleTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AD Image</th>
                                <th>Slot No</th>
                                <th>AD. ID. No.</th>
                                <th>AD Name</th>
                                <th>AD. Caption</th>
                                <th>Client No.</th>
                                <th>Number of Weeks</th>
                                <th>Total</th>
                                <th>Activation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='item in list.data' :key='item.id'>
                                <td>{{item.id}}</td>
                                <td></td>
                                <td></td>
                                <td>{{item.ad_ID}}</td>
                                <td>{{item.ad_name}}</td>
                                <td>{{item.ad_caption}}</td>
                                <td>{{item.client_no}}</td>
                                <td>{{item.number_of_week}}</td>
                                <td>{{item.total}}</td>
                                <td></td>
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
        <!-- <div class="row">
            <div class="col-sm-2 mt-3" v-for=" index in 24" :key="index">
                <div class="text-center">
                    <button class="bg-secondary d-flex justify-content-center  align-items-center text-white" style="width: 150px; height:100px; font-size:30px;" data-toggle="modal" data-target="#createAdScheduleModal" @click="slotNumber(index);">+</button>
                    <p><strong>Slot {{index}}</strong></p>
                </div>
            </div>
        </div> -->
        <!-- <font-awesome-icon icon="eye" />
        <font-awesome-icon :icon="['fas', 'user-secret']" />
        <font-awesome-icon :icon="['fab', 'facebook']" />
        <font-awesome-icon icon="edit" symbol="eye" /> -->

        <!-- Add New AD Schedule Modal -->
        <div class="modal fade" id="createAdScheduleModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Slot {{slot_index}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-2 mt-3">Create Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="dateTime" readonly>
                            </div>
                            <div class="col-sm-2 mt-3">AD. ID No.</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.ad_ID">
                            </div>
                            <div class="col-sm-2 mt-3">AD. Name</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.ad_name">
                            </div>
                            <div class="col-sm-2 mt-3">AD. Caption</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.ad_caption">
                            </div>
                            <div class="col-sm-2 mt-3">Client No.</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.client_no">
                                        <option v-for="(client, index) in clients" :key="index" v-bind:value="client.id">{{ client.client_name }}---{{ client.id }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">AD. Description</div>
                            <div class="col-sm-10 mt-3">
                                <textarea class="form-control" rows="5" v-model="add.description"></textarea>
                            </div>
                            <div class="col-sm-2 mt-3">Visual Identity</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-group">
                                    <select class="form-control" v-model="add.visual_identity">
                                        <option v-for="(visual_identity, index) in visual_identities" :key="index" v-bind:value="visual_identity.id">{{ visual_identity.visual_identity }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Start Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.start_date">
                            </div>
                            <div class="col-sm-2 mt-3">End Date</div>
                            <div class="col-sm-10 mt-3">
                                <input type="date" class="form-control" v-model="add.end_date">
                            </div>
                            <div class="col-sm-2 mt-3">Rate Card</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control-lg" :placeholder="rateCard">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#rateCardModal">Click Here</button>
                            </div>
                            <div class="col-sm-2 mt-3">Number of Weeks</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.number_of_week">
                            </div>
                            <div class="col-sm-2 mt-3">Slots</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.slot">
                            </div>
                            <div class="col-sm-2 mt-3">Cost</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.cost">
                            </div>
                            <div class="col-sm-2 mt-3">Discount</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.discount">
                            </div>
                            <div class="col-sm-2 mt-3">Tax/SST</div>
                            <div class="col-sm-10 mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="1" v-model="add.tax">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="addradio" v-bind:value="0" v-model="add.tax">No
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-3">Total</div>
                            <div class="col-sm-10 mt-3">
                                <input type="text" class="form-control" v-model="add.total">
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

        <!-- Rate Card Modal -->
        <div class="modal fade" id="rateCardModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Rate Card</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div >
                            <label for="page">Page</label>
                            <div class="form-group">
                                <select class="form-control" name="page" v-model="add.page">
                                    <option v-bind:value="1">Page 1 | Login</option>
                                    <option v-bind:value="2">Page 2 | Sign Up</option>
                                </select>
                            </div>
                            <label for="second">Seconds</label>
                            <div class="form-group">
                                <select class="form-control" name="second" v-model="add.seconds">
                                    <option v-bind:value="5">5s</option>
                                    <option v-bind:value="10">10s</option>
                                    <option v-bind:value="15">15s</option>
                                    <option v-bind:value="20">20s</option>
                                    <option v-bind:value="25">25s</option>
                                    <option v-bind:value="30">30s</option>
                                </select>
                            </div>
                            <label for="rate">Rate</label>
                            <input type="text" class="form-control" name="rate" v-model="add.rate">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Ad Schedule Modal -->
        <div class="modal fade" id="editPostModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Advertise</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

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
            this.fetchAdSchedule();
            this.currentDateTime();
            this.fetchAdClient();
            this.fetchAllAds();
        },

        data(){
            return {
                slot_index:"",
                dateTime:"",
                list:{},
                clients:{},
                visual_identities:{},
                add: {
                    id: "",
                    ad_ID: "",
                    ad_client: "",
                    ad_name: "",
                    ad_caption: "",
                    client_no: "",
                    description: "",
                    visual_identity: "",
                    start_date: "",
                    end_date: "",
                    page: "",
                    seconds: "",
                    rate: "",
                    number_of_week: "",
                    slot: "",
                    cost: "",
                    discount: "",
                    tax: "",
                    total: "",
                },
            }
        },

        computed: {
            rateCard(){
                //console.log(this.add.page, this.add.seconds, this.add.rate);
                return 'Page '+ this.add.page +'. '+ this.add.seconds +'S.'+' RM '+ this.add.rate;
            },
        },

        methods:{
            fetchAdSchedule(){
                axios.get('http://localhost:8000/api/ad_schedules')
                .then(res => {
                    this.list = res.data;
                    //console.log(this.list);
                }).then(res => {
                    $("#adScheduleTable").DataTable({
                        //"dom":'<"row"<"col-sm-12"B>flrtip<"clear">',
                        "dom": 'Bflrtip<"clear">',
                        "buttons": [
                            //{extend: 'copy'},
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
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
                            { "visible": false, "targets": 9 }
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
                    var table = $('#adScheduleTable').DataTable();
                    $('#active').on('click', function () {
                      table
                        .column( 9 )
                        .search(1)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                    $('#deactive').on('click', function () {
                      table
                        .column( 9 )
                        .search(0)
                        //.search('sayed|Science', true, false)
                        .draw();
                    });
                }).catch(err => {console.log(err);});
            },

            slotNumber(index){
                this.slot_index = index;
            },

            currentDateTime() {
                const current = new Date();
                const date = current.getDate()+'-'+(current.getMonth()+1)+'-'+current.getFullYear();
                //const time = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
                //this.dateTime = date +' '+ time;
                this.dateTime = date;
                //console.log(this.dateTime);

                return this.dateTime;
            },

            fetchAdClient(){
                axios.get('http://localhost:8000/api/ad_clients')
                .then(res => {
                    this.clients = res.data.data;
                }).catch(err => {
                    console.log(err);
                });
            },

            fetchAllAds(){
                axios.get('http://localhost:8000/api/ads')
                .then(res => {
                    this.visual_identities = res.data.data;
                }).catch(err => {
                    console.log(err);
                });
            },

            addPost(){
                if(this.add.ad_ID == '' || this.add.ad_name == '' || this.add.ad_caption == '' || this.add.client_no == '' || this.add.description == '' || this.add.visual_identity == '' || this.add.start_date == '' || this.add.end_date == '' || this.add.rate == '' || this.add.number_of_week == '' || this.add.slot == '' || this.add.cost == '' || this.add.discount == '' || this.add.tax == '' || this.add.total == ''){
                    return alert("Please fill-up all the fields");
                }
                axios.post('http://localhost:8000/api/create_ad_schedule', this.add)
                .then(res => {
                    if(res.status == 201){
                        //this.add.floor_name == "";
                        //this.add.floor_category == "";
                        location.reload();
                    }
                }).catch(error => {
                    console.log(error);
                });
            },
            editPost(id){
                axios.get('http://localhost:8000/api/single_ad_schedule/'+id)
                .then(res => {
                    this.add.id = res.data.data.id,
                    this.add.ad_client = res.data.data.ad_client,
                    this.add.merchant = res.data.data.merchant,
                    this.add.client_name = res.data.data.client_name,
                    this.add.selling_identity = res.data.data.selling_identity,
                    this.add.ad_name = res.data.data.ad_name,
                    this.add.ad_caption = res.data.data.ad_caption,
                    this.add.ad_duration = res.data.data.ad_duration,
                    this.add.visual_identity = res.data.data.visual_identity
                    //this.add.activation = res.data.data.activation
                }).catch(error => {
                    console.log(error);
                });
            },
            updatePost(){
                axios.put('http://localhost:8000/api/update_ad_schedule/' + this.add.id, this.add)
                .then(res => {
                    if(res.status == 200){
                        location.reload();
                        //alert("Successfully Updated");
                    }
                   // this.fetchAPI();
                }).catch(err => {
                    console.log(err);
                });
            },
            deletePost(id){
                //alert("Successfully Deleted");
                console.log(id);
                axios.delete('http://localhost:8000/api/ad_schedules/'+id)
                .then(res => {
                    console.log("deleted", res.data);
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
