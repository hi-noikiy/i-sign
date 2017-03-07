<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ title }} <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" v-model="user.name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="mobile" v-model="user.mobile">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn" :class="[user.sex ? 'btn-primary' : 'btn-default']" @click="user.sex=true" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male"> &nbsp; 男
                                    </label>
                                    <label  class="btn" :class="[user.sex ? 'btn-default' : 'btn-primary']" @click="user.sex=false" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female"> 女&nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">公司 <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="company" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" v-model="user.company">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">职位 <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="position" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" v-model="user.position">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                    </form>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button v-if="!(isCreateUser)" class="btn btn-success" @click="updateUser">保存</button>
                            <button v-if="isCreateUser" class="btn btn-success" @click="createUser">新建</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {show_stack_bottomright, show_stack_errors} from '../app.notify'

    export default {
        props: {
            'id': [String, Number],
        },
        data() {
          return {
              'user': {
                  sex: true
              },
          }
        },
        computed: {
            isCreateUser() {
                if(this.id) {
                    return  false
                } else {
                    return  true
                }

            },
            title() {
                if(this.id) {
                    return  "用户信息编辑"
                }
                return  "新增用户"
            }
        },
        methods: {
            fetchUser(id) {
                let self = this
                axios.get('admin/api/user/'+id).then(function(response) {

                    if (response.error) {

                        show_stack_bottomright('error')
                    } else {

                        self.user = response.data;
                    }

                    console.log(response.data)
                }).catch(function (error) {
                    console.log('error:' + error.toString())
                })

                NProgress.done();
            },
            createUser() {
                let self = this
                axios.post('admin/api/user', {
                    user: self.user
                }).then(function(response) {
                    if (response.data.error) {
                        show_stack_bottomright('error', response.data.error.message)
                    } else {
                        show_stack_bottomright('success', '创建用户成功')
                        self.$router.go(-1)
                    }
                }).catch(function(error) {

                    console.log(error.response);
                    if(error.response) {
                        show_stack_errors(error.response)
                    } else {
                        show_stack_bottomright('error', '服务器开小差了!');
                    }

                })
            },
            updateUser() {
                let self = this
                axios.put('admin/api/user', {
                    user: self.user
                }).then(function(response) {
                    if (response.data.error) {
                        show_stack_bottomright('error', response.data.error.message)
                    } else {
                        show_stack_bottomright('success', '更新用户信息成功')
                    }
                }).catch(function(error){
                    show_stack_bottomright('error', '服务器错误:'+error.toString())
                })
            }
        },
        created() {

            if(this.id) {
                NProgress.start();
                this.fetchUser(this.id)
            }


        }
    }
</script>