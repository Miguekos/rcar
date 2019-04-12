<template>
  <div>
    <template v-if="length > 1">
      <div class="img-wrapper">
        <div class="img-container" v-for="(file, index) in files" :key="index">
          <img height="250px" :src="file.url" @click="uploadImage">
        </div>
      </div>
    </template>
    <template v-else>
      <div class="img-wrapper">
        <div class="img-container">
          <img height="250px" :src="files[0].url" @click="uploadImage">
        </div>
      </div>
    </template>
    <input type="file" multiple accpet ref="uploadFileReference" @change="uploadFileReference">

    <!-- <template>
              <div style="border-radius: 10px 10px 10px 10px;" class>
                <div class>
                  <img height="250px" :src="files[0].url" @click="uploadImage(0)">
                </div>
              </div>
            </template>
            <input
              type="file"
              multiple
              accpet
              ref="uploadFileReference"
              @change="uploadFileReference"
    >-->
    <!-- <pre>{{ $data }}</pre> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      length: 1,
      files: [
        {
          id: 1,
          url: "/img/placeholder-image.png"
        }
      ]
    };
  },
  methods: {
    uploadImage() {
      this.$refs.uploadFileReference.click();
    },
    uploadFileReference(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.length = files.length;
      this.showImage(files);
    },
    showImage(files) {
      this.files = [];
      const test = Array.from(files).forEach((file, idx) => {
        const fileReader = new FileReader();
        const getResult = new Promise(resolve => {
          fileReader.onload = e => {
            this.subirimagen(e.target.result);
            this.files.push({
              id: idx,
              url: e.target.result
            });
          };
        });

        fileReader.readAsDataURL(file);
        return getResult.then(file => {
          return file;
        });
      });
    },
    subirimagen(image) {
      axios
        .post("/upload", { base64: image })
        .then(response => {
          console.log(response);
          this.$emit("fotoperfilafiliados", `/images/${response.data}`);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style scoped>
input[type="file"] {
  display: none;
}
</style>
