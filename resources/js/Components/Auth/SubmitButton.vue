<template>
  <button class="w-100 btn btn-lg btn-primary" type="submit" :disabled="disabled">
		<slot/>
  </button>
</template>
<script>
export default {
  props: {
        disabled: Boolean
    }
}
</script>