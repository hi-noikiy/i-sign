<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Bus Form <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> 名称 <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" v-model="bus.name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">说明 <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" v-model="bus.description">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">座位数</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" v-model="bus.seat_count">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">禁用</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="" data-toggle="buttons">
                                    <label>
                                        <input type="radio" @click="bus.is_active = true" :class="{checked: bus.is_active}"> &nbsp; 是 &nbsp;
                                    </label>
                                    <label >
                                        <input type="radio" @click="bus.is_active = false" :class="{checked: !bus.is_active}"> &nbsp; 否 &nbsp;
                                    </label>
                                </div>

                                <!--<div id="gender" class="" data-toggle="buttons">-->
                                    <!--<label>-->
                                        <!--<input type="radio" value="true" v-model="bus.is_active"> &nbsp; 是 &nbsp;-->
                                    <!--</label>-->
                                    <!--<label>-->
                                        <!--<input type="radio" value="false" v-model="bus.is_active"> &nbsp; 否 &nbsp;-->
                                    <!--</label>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">车辆当前状态 <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <label class="btn btn-default btn-sm">&nbsp;未发车&nbsp;&nbsp;</label>
                                <label class="btn btn-default btn-sm">到达机场</label>
                                <label class="btn btn-default btn-sm">前往酒店</label>
                                <label class="btn btn-default btn-sm">到达酒店</label>
                            </div>

                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        data() {
            return {
                bus: {}
            }
        },
        mounted() {

        }
    }
</script>