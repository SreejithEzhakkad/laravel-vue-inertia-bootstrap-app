<template>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted"
                >Copyright © {{ new Date().getFullYear() }} {{ appAuthor }}. All rights reserved</span
            >
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            appAuthor: process.env.MIX_APP_AUTHOR,
        };
    },
};
</script>
