<template>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>管理后台</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img :src="avatarPath" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ user.name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <Sidebar></Sidebar>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <Navbar :avatar-path="avatarPath" :user="user"></Navbar>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!--路由视图显示-->
                <router-view></router-view>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <Footerbar></Footerbar>
            <!-- /footer content -->
        </div>
    </div>
</template>

<script>
    import Navbar from './components/layouts/Navbar.vue'
    import Sidebar from './components/layouts/Sidebar.vue'
    import Footerbar from './components/layouts/Footerbar.vue'

//    import Axios from 'axios'

    export default {
        components: {
            Navbar,
            Sidebar,
            Footerbar
        },
        data: function () {

            return {
                avatarPath: "bower_dl/gentelella/production/images/img.jpg",
                user:{}
            }
        },
        mounted() {
            //挂载元素之后加载 js
            require('./custom')
            require('./jquery.dataTables')

        },
        created () {
            //请求用户数据
            let self = this
            axios.get('admin/api/me').then(function(response) {
                console.log(response.data)
                self.user = response.data
            }).catch(function (error) {

            });
        }
    }

</script>