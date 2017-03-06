<template>

    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> 班车签到管理 <small>Float left</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content" style="display: block;">

            <div class="col-xs-2">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-pills tabs-left">
                    <template v-for="bus in buses">
                        <li :class="{ active: (currentClickBusId == bus.id)}" @click="getUsersFromBus(bus.id)">
                            <a>{{ bus.name }}</a>
                        </li>
                    </template>
                </ul>
            </div>

            <div v-if="currentClickBusId > 0" class="col-xs-10">
                <!-- table -->
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-2">
                                <h2>用户签到</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="请输入手机号进行签到" v-model="userSignMobile">
                                </div>
                                <button class="btn btn-success" @click="beginSign()">开始签到</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-3">
                                <h2>已签到用户列表</h2>
                            </div>
                        </div>
                        <p class="text-muted font-13 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>mobile</th>
                                <th>sex</th>
                                <th>company</th>
                                <th>position</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.mobile }}</td>
                                    <td>{{ user.sex }}</td>
                                    <td>{{ user.company }}</td>
                                    <td>{{ user.position }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div v-else>
                <h3>请在左侧选择车辆</h3>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

</template>

<script>
    import {show_stack_bottomright} from '../app.notify'
    export default {
        data() {
            return {
                buses: [],
                users: [],
                currentClickBusId: 0,
                userSignMobile: null
            }
        },
        methods: {

            fetchBuses() {
                NProgress.start()
                let self = this
                axios.get('admin/api/buses').then(function(response) {
                    self.buses = response.data.data
                    show_stack_bottomright('success', '获取班车列表成功!')
                    NProgress.done()
                }).catch(function(error) {
                    show_stack_bottomright(' error', '获取班车列表失败!')
                    NProgress.done()
                })
            },

            getUsersFromBus(id) {

                NProgress.start()
                let self = this
                self.currentClickBusId = id
                axios.get('admin/api/busSignUsers', {
                    params: {
                        id: id
                    }
                }).then(function(response) {
                    console.log(response.data.data)
                    self.users = response.data.data
                    show_stack_bottomright('success', '获取班车列表成功!')
                    NProgress.done()
                }).catch(function(error) {
                    show_stack_bottomright(' error', '获取班车列表失败!')
                    NProgress.done()
                })
            },

            beginSign() {

                axios.post('admin/api/userSignByBus', {
                    params: {
                        mobile: this.userSignMobile,
                        busId: self.currentClickBusId
                    }
                }).then(function (response) {
                    console.log(response)
                }).catch(function (error) {
                    
                })
            }
        },
        created() {
            this.fetchBuses()
        }
    }
</script>