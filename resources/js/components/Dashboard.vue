<template>
    <div class="p-6 bg-gray-100 min-h-screen">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">Nomor Tersimpan: 3</div>
            <div class="bg-white p-4 rounded shadow">WhatsApp Terkirim: 83</div>
            <div class="bg-white p-4 rounded shadow">Auto Reply: 5</div>
        </div>
        <div class="mt-6">
            <canvas id="chart"></canvas>
        </div>
    </div>
</template>

<script>
import { Chart } from 'chart.js';

export default {
    mounted() {
        const ctx = document.getElementById('chart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [
                    {
                        label: 'Pesan Terkirim',
                        data: [10, 20, 30, 40, 50],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.4,
                    },
                ],
            },
        });
    },
};
</script>

<style scoped>
canvas {
    max-width: 100%;
}
</style>
