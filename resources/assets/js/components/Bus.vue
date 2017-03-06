<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>班车列表 <small>buses</small></h2>
                    <router-link to="/bus/create"><button class="btn btn-success pull-right" >新增班车</button></router-link>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>名称</th>
                            <th>说明</th>
                            <th>核载</th>

                            <th>路程状态</th>
                            <th>启用</th>
                            <th>发时</th>
                            <th>到时</th>
                            <th>操作</th>

                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="bus in buses">
                            <td>{{ bus.id }}</td>
                            <td>{{ bus.name }}</td>
                            <td>{{ bus.description }}</td>
                            <td>{{ bus.seat_count }}</td>

                            <td>{{ bus.state }}</td>
                            <td>{{ bus.is_active }}</td>
                            <td>{{ bus.sended_at }}</td>
                            <td>{{ bus.arrived_at }}</td>
                            <td style="width: 100px">
                                <button class="btn btn-default btn-sm" @click="editbus(bus)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import {show_stack_bottomright} from '../app.notify'
    export default {
        data() {
            return {
                buses: []
            }
        },
        methods: {

            fetchUsers() {
                NProgress.start()
                let self = this
                axios.get('admin/api/buses').then(function(response) {
                    self.buses = response.data.data
                    show_stack_bottomright('success', '获取班车列表成功!')
                    NProgress.done()
                    $(document).ready(function(){
                        $('#datatable').DataTable();
                    });
                }).catch(function(error) {
                    show_stack_bottomright(' error', '获取班车列表失败!')
                    NProgress.done()
                })
            }
        },
        created() {
            this.fetchUsers()
        },

    }
</script>