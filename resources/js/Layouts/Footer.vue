<template>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted"
                >© {{ new Date().getFullYear() }} Copyright: {{ appName }}</span
            >
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            appName: process.env.MIX_APP_NAME,
        };
    },
};
</script>
