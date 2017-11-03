<template>
    <div>
        <el-table :data="data" style="width: 100%;">
            <el-table-column prop="type" label="类型" width="100"></el-table-column>
            <el-table-column prop="time" label="时间" width="120"></el-table-column>
            <el-table-column prop="version" label="版本" width="120"></el-table-column>
            <el-table-column prop="des" label="描述"></el-table-column>
            <el-table-column prop="href" label="url"></el-table-column>
            <el-table-column label="操作" width="80"></el-table-column>
            <el-table-column label="详情" width="80"></el-table-column>
            
        </el-table>
    </div>
    
</template>

<script>
export default {
    name: 'page-main',
    data () {
        return [];
    }
};
</script>

