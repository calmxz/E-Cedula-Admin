import axios from 'axios';
import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function() {
    function fetchDataAndUpdate() {
        axios.get('/dashboard-data')
            .then(response => {
                const data = response.data;

                // Format numbers to 2 decimal places
                const formattedCollectionsToday = data.collectionsToday.toFixed(2);
                const formattedTransactionsToday = data.transactionsToday
                const formattedWeeklyEarnings = data.collectionsThisWeek.toFixed(2);
                const formattedTransactionsThisWeek = data.transactionsThisWeek

                // Update the DOM with the fetched and formatted data
                document.getElementById('collectionsToday').textContent = formattedCollectionsToday;
                document.getElementById('transactionsToday').textContent = formattedTransactionsToday;
                document.getElementById('collectionsThisWeek').textContent = formattedWeeklyEarnings;
                document.getElementById('transactionsThisWeek').textContent = formattedTransactionsThisWeek;

                // Update charts with the fetched data
                updateCharts(data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function updateCharts(data) {
        const weeklyEarningsChart = new Chart(document.getElementById('weeklyEarningsChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', '2 Days Ago', 'Yesterday', 'Today'],
                datasets: [{
                    label: 'Earnings',
                    data: data.weeklyEarnings,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        const dailyEarningsChart = new Chart(document.getElementById('dailyEarningsChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', '2 Days Ago', 'Yesterday', 'Today'],
                datasets: [{
                    label: 'Earnings',
                    data: data.weeklyTransactions,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });
    }

    // Initial fetch
    fetchDataAndUpdate();
});