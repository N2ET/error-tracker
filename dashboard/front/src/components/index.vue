<template>
  <div>
    <page-header></page-header>
    <div>
      <page-nav class="page-nav"></page-nav>
      <page-main class="page-main"></page-main>
    </div>
  </div>
</template>

<script>
import PageHeader from './header';
import PageMain from './main';
import PageNav from './nav';

export default {
  name: 'index',

  components: {
    PageHeader,
    PageMain,
    PageNav
  },

  data() {
    return {
      msg: ''
    }
  },

  mounted() {
    // fetch('/yellow')
    //   .then(response => response.json())
    //   .then(data => {
    //     console.log(data)
    //     return data
    //   })
    //   .catch(e => console.error('error', e))


    // let vm = this;

    // let data = new FormData();
    // data.append('data', JSON.stringify([
    //   {
    //     type: 'hello-type',
    //     tag: 'hci',
    //     version: 'hci5.8',
    //     code_version: 1001,
    //     des: 'desc--11',
    //     detail: 'hhhhhhdetail',
    //     idx: 1,
    //     href: 'http://localhost/'
    //   }
    // ]));

    // let resCopy;

    // fetch('http://localhost/collect.php', {
    //   method: 'POST',
    //   mode: 'cors',
    //   headers: {
    //     'Access-Control-Allow-Origin': '*'
    //   },
    //   body: data
    // })
    //   .then(res => {
    //     resCopy = res.clone();
    //     return res.json();
    //   })
    //   .then(data => {
    //     vm.msg = data;
    //     resCopy = null;
    //     return data;
    //   })
    //   .catch(e => {
    //     resCopy.text().then(text => {
    //       vm.msg = text;
    //     });
    //     resCopy = null;
    //   });


  }
}
</script>

<style>

  .page-nav {
    float: left;
  }

  .page-main {
    padding: 5px;
    margin-left: 200px;
  }
</style>
