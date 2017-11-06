<template>
    <el-menu default-active="latest" class="page-nav">
        <el-menu-item index="latest">
            最近事件
        </el-menu-item>
        <!-- <el-menu-item index="vt">VT</el-menu-item> -->
    </el-menu>
</template>

<script>
export default {
    name: 'page-nav'
};
</script>

<style>
    .page-nav {
        width: 200px;
        background: white;
    }
</style>


