<template>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>后台</h3>
            <ul class="nav side-menu">
                <li><router-link to="/"><i class="fa fa-home"></i> Dashboard </router-link></li>
                <li><a><i class="fa fa-edit"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><router-link to="/users">用户</router-link></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-bus" aria-hidden="true"></i> 班车签到 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><router-link to="/buses">车辆管理</router-link></li>
                        <li><router-link to="/buses/user">签到列表</router-link></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {

    }
</script>