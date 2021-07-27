<template>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div :id="id" :class="[toastClasses.main, toastClasses.center, toastClasses.center, toastClasses.text, bg, toastClasses.border]"  role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">{{message}}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
</template>
<script>
import { Toast } from 'bootstrap';

export default {
  props: {
    message: {
      type: String,
      default: '',
    },
    bg: {
      type: String,
      default: 'success'
    },
    id: {
      type: Number,
      default: ''
    }
  },
  data() {
    return {
      toastClasses: {
        main: 'toast',
        center: 'align-items-center',
        text: 'text-white',
        bg: 'bg-primary',
        border: 'border-0'
      }
    }
  },
  methods: {
    showToast(){
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function (toastEl) {
        return new Toast(toastEl)
      });
      toastList.forEach( toast => {
        toast.show()
      });
    }
  },
  mounted() {
    this.showToast();
  },
  updated() {
    this.showToast();
  }
}
</script>