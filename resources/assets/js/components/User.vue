<template>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>用户列表 <small>Users</small></h2>
                    <button class="btn btn-primary pull-right" ><i class="fa fa-file-excel-o" aria-hidden="true"></i> 导入用户</button>
                    <router-link to="/user/create"><button class="btn btn-success pull-right" >新增用户</button></router-link>
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
                            <th>姓名</th>
                            <th>手机号</th>
                            <th>性别</th>
                            <th>公司</th>
                            <th>职称</th>
                            <th>操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="user in users">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.mobile }}</td>
                            <td>{{ user.sex ? '男' : '女' }}</td>
                            <td>{{ user.company }}</td>
                            <td>{{ user.position }}</td>
                            <td style="width: 100px">
                                <button class="btn btn-default btn-sm" @click="editUser(user)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
    export default {
        data() {
            return {
                users: []
            }
        },
        methods: {

            fetchUsers() {
                let self= this
                axios.get('admin/api/users').then(function (response) {

                    self.users = response.data.data
                    $(document).ready(function(){
                        $('#datatable').DataTable();
                    });

                }).catch(function (error) {

                    console.log(error)
                });

                NProgress.done();
//                show_stack_success('info');

            },
            editUser(user) {
                this.$router.push({name: 'user', params: {id: user.id} })
            }
        },
        created() {
            NProgress.start();
            this.fetchUsers()
        }
    }
</script>