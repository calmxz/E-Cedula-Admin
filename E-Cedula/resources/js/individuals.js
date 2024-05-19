import './bootstrap';

async function populateIndividualsTable(){
    try{
        const response = await axios.get('/api/individuals');
        const tableBody = document.querySelector('.table tbody');

        tableBody.innerHTML = '';
        
        response.data.forEach((individuals, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${index + 1}</td>
            <td>${individuals.CCI2024No}</td>
            <td>${individuals.DateCreated}</td>
            <td>${individuals.LastName}</td>
            <td>${individuals.MiddleName}</td>
            <td>${individuals.FirstName}</td>
            <td>${individuals.ExtensionName}</td>
            <td>${individuals.Sex}</td>
            <td>${individuals.Region}</td>
            <td>${individuals.Province}</td>
            <td>${individuals.Municipality}</td>
            <td>${individuals.DateOfBirth}</td>
            <td>${individuals.PlaceOfBirth}</td>
            <td>${individuals.CivilStatus}</td>
            <td>${individuals.Citizenship}</td>
            <td>${individuals.ICRNo}</td>
            <td>${individuals.HeightInFt}</td>
            <td>${individuals.WeightInKg}</td>
            <td>${individuals.AreYouEmployed}</td>
            <td>${individuals.TINNo}</td>
            <td>${individuals.ProfessionOccupationBusiness}</td>
            <td>${individuals.SalariesOrGrossReceipt}</td>
            <td>${individuals.TotalCommunityTaxDue}</td>
            <td>${individuals.Interest}</td>
            <td>${individuals.TotalAmountPaid}</td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error("Error fetching individuals:", error);
    }
}

window.onload = () => {
    populateIndividualsTable();
}