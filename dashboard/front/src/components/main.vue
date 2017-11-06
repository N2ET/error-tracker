<template>
    <div>
        <div class="toolbar">
            <el-button size="small" @click="refresh" class="btn-refresh">
                刷新
            </el-button>   
        </div>
        <el-table class="err-grid" style="width: 100%;" :data="data">
            <el-table-column prop="type" label="类型" width="100">
                <template scope="props">
                    <div :class="formatTypeClass(props.row.type)">
                        {{props.row.type || 'unknow'}}
                    </div>
                    
                </template>
            </el-table-column>
            <el-table-column prop="time" label="时间" width="180"></el-table-column>
            <el-table-column prop="version" label="版本" width="120"></el-table-column>
            <el-table-column prop="des" label="描述"></el-table-column>
            <el-table-column prop="href" label="url"></el-table-column>
            <el-table-column label="操作" width="80"></el-table-column>
            <el-table-column label="详情" width="80">
                
            </el-table-column>
            
        </el-table>
    </div>
    
</template>

<script>
export default {
    name: 'page-main',
    data () {
        return {
            data: [{
                type: 'dsfsdf',
                time: 'sdfdsf',
                version: '',
                des: '',
                href: ''
            }]
        };
    },

    mounted () {
        this.load();
    },

    methods: {
        refresh () {
            this.load();
        },

        load () {
            let vm = this;
            let resCopy;

            fetch('http://localhost/query.php', {
                method: 'GET',
                mode: 'cros',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            })
                .then((res) => {
                    resCopy = res.clone();
                    return res.json();
                })
                .then(json => {
                    vm.data = json.data;
                    resCopy = null;
                })
                .catch(() => {
                    if(!resCopy) {
                        return;
                    }
                    resCopy.text().then(msg => {
                        this.$notify({
                            type: 'error',
                            message: msg
                        });
                    });
                    resCopy = null;
                });
        },

        formatTypeClass (type) {
            return 'err-type err-type--' + (type || 'unknow').toLowerCase();
        }
    }
};
</script>

<style scoped>
    .toolbar {
        padding: 5px 0;
    }

    
    .err-grid tbody {
        color: #999;
    }


    .err-type--error_runtime {
        color: red;
    }

    .err-type--error_console {
        color: red;
    }

    .err-type--error_try_catch {
        color: red;
    }

    .err-type--error_script,
    .err-type--error_style,
    .err-type--error_image {
        color: orange;
    }


</style>


