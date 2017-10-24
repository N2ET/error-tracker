<template>
  <div class="index">
    <div v-html="msg"></div>
  </div>
</template>

<script>
export default {
  name: 'index',
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
    let vm = this;

    let data = new FormData();
    data.append('data', JSON.stringify([
      {
        type: 'hello-type',
        tag: 'hci',
        version: 'hci5.8',
        code_version: 1001,
        des: 'desc--11',
        detail: 'hhhhhhdetail',
        idx: 1,
        href: 'http://localhost/'
      }
    ]));

    let resCopy;

    fetch('http://localhost/collect.php', {
      method: 'POST',
      //mode: 'no-cors',
      mode: 'cors',
      headers: {
        //   'Content-Type': 'application/json'
        'Access-Control-Allow-Origin': '*'
      },
      body: data
    })
      .then(res => {
        resCopy = res.clone();
        return res.json();
      })
      .then(data => {
        vm.msg = data;
        resCopy = null;
        return data;
      })
      .catch(e => {
        resCopy.text().then(text => {
          vm.msg = text;
        });
        resCopy = null;
      });


  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1,
h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
