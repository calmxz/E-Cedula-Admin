import './bootstrap';
import axios from 'axios'

async function populateIndividualsTable(){
    try{
        const response = await axios.get('/api/individuals');
        const tableBody = document.querySelector('table tbody');

        tableBody.innerHTML = '';
        
        response.data.forEach((individuals, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${individuals.CCI2024No}</td>
                <td>${new Date(individuals.DateCreated).toLocaleString()}</td>
                <td>${individuals.LastName}</td>
                <td>${individuals.MiddleName || ''}</td>
                <td>${individuals.FirstName}</td>
                <td>${individuals.ExtensionName || ''}</td>
                <td>${individuals.Sex}</td>
                <td>${individuals.Region}</td>
                <td>${individuals.Province}</td>
                <td>${individuals.Municipality}</td>
                <td>${new Date(individuals.DateOfBirth).toLocaleDateString()}</td>
                <td>${individuals.PlaceOfBirth}</td>
                <td>${individuals.CivilStatus}</td>
                <td>${individuals.Citizenship}</td>
                <td>${individuals.ICRNo || ''}</td>
                <td>${individuals.Height}</td>
                <td>${individuals.Weight || ''}</td>
                <td>${individuals.Employed}</td>
                <td>${individuals.TIN || ''}</td>
                <td>${individuals.profession}</td>
                <td>${individuals.GrossEarnings}</td>
                <td>${individuals.taxableAmount}</td>
                <td>${individuals.basicCommunityTax}</td>
                <td>${individuals.communityTaxDue}</td>
                <td>${individuals.Total}</td>
                <td>${individuals.Interest}</td>
                <td>${individuals.TotalAmountPaid}</td>
                <td>${individuals.paymentMethod}</td>
                <td>${individuals.paymentReferenceNumber}</td>
                <td>${individuals.ticketNumber}</td>
                <td>
                <div class="d-flex">
                    <button type="button" data-id="${individuals._id}" class="btn btn-success me-2 btn-update">Update</button>
                    <button type="button" data-id="${individuals._id}" class="btn btn-danger btn-delete">Delete</button>
                </div>
            </td>
            `;
            tableBody.appendChild(row);
        });

        // Filter individuals based on search input
        searchInput.addEventListener('input', function () {
            const filter = searchInput.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const columns = rows[i].getElementsByTagName('td');
                let match = false;
                for (let j = 0; j < columns.length; j++) {
                    if (columns[j]) {
                        const textValue = columns[j].textContent || columns[j].innerText;
                        if (textValue.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }
                if (match) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    } catch (error) {
        console.error("Error fetching individuals:", error);
    }
}

document.addEventListener('click', function (event){
    if (event.target.classList.contains('btn-update')){
        const individualId = event.target.getAttribute('data-id');
        updateIndividualData(individualId);
    }
});

document.addEventListener('click', function(event){
    if (event.target.classList.contains('btn-delete')){
        const individualId = event.target.getAttribute('data-id');
        deleteIndividualData(individualId);
    }
});

window.onload = () => {
    populateIndividualsTable();

    const saveButton = document.getElementById('save');
    saveButton.addEventListener('click', saveChanges)
}

async function updateIndividualData(individualId){
    const individualToUpdate = await getIndividualById(individualId);
    
    document.getElementById('first_name').value = individualToUpdate.FirstName;
    document.getElementById('middle_name').value = individualToUpdate.MiddleName || '';
    document.getElementById('last_name').value = individualToUpdate.LastName;
    document.getElementById('extension_name').value = individualToUpdate.ExtensionName || '';
    document.getElementById('sex').value = individualToUpdate.Sex;
    document.getElementById('region').value = individualToUpdate.Region;
    document.getElementById('province').value = individualToUpdate.Province;
    document.getElementById('municipality').value = individualToUpdate.Municipality;
    document.getElementById('date_of_birth').value = individualToUpdate.DateOfBirth;
    document.getElementById('place_of_birth').value = individualToUpdate.PlaceOfBirth;
    document.getElementById('civil_status').value = individualToUpdate.CivilStatus;
    document.getElementById('citizenship').value = individualToUpdate.Citizenship;
    document.getElementById('icr_no').value = individualToUpdate.ICRNo;
    document.getElementById('height').value = individualToUpdate.Height;
    document.getElementById('weight').value = individualToUpdate.Weight || '';
    document.getElementById('employed').value = individualToUpdate.Employed;
    document.getElementById('tin').value = individualToUpdate.TIN || '';
    document.getElementById('profession').value = individualToUpdate.profession;
    document.getElementById('gross_earnings').value = individualToUpdate.GrossEarnings;
    document.getElementById('taxable_amount').value = individualToUpdate.taxableAmount;
    document.getElementById('basic_community_tax').value = individualToUpdate.basicCommunityTax;
    document.getElementById('community_tax_due').value = individualToUpdate.communityTaxDue;
    document.getElementById('total').value = individualToUpdate.Total;
    document.getElementById('interest').value = individualToUpdate.Interest;
    document.getElementById('total_amount_paid').value = individualToUpdate.TotalAmountPaid;
    document.getElementById('payment_method').value = individualToUpdate.paymentMethod;
    document.getElementById('payment_reference_number').value = individualToUpdate.paymentReferenceNumber;
    document.getElementById('ticket_number').value = individualToUpdate.ticketNumber;

    document.getElementById('updateModal').click();

    const saveButton = document.getElementById('save');
    saveButton.setAttribute('data-id', individualId)
}

function saveChanges(){
   const first_name = document.getElementById('first_name').value;
   const middle_name = document.getElementById('middle_name').value || '';
   const last_name = document.getElementById('last_name').value;
   const extension_name = document.getElementById('extension_name').value || '';
   const sex = document.getElementById('sex').value;
   const region = document.getElementById('region').value;
   const province = document.getElementById('province').value;
   const municipality = document.getElementById('municipality').value;
   const date_of_birth = document.getElementById('date_of_birth').value;
   const place_of_birth = document.getElementById('place_of_birth').value;
   const civil_status = document.getElementById('civil_status').value;
   const citizenship = document.getElementById('citizenship').value;
   const icr_no = document.getElementById('icr_no').value || '';
   const height = document.getElementById('height').value;
   const weight = document.getElementById('weight').value || '';
   const employed = document.getElementById('employed').value;
   const tin = document.getElementById('tin').value || '';
   const profession = document.getElementById('profession').value;
   const gross_earnings = document.getElementById('gross_earnings').value;
   const taxable_amount = document.getElementById('taxable_amount').value;
   const basic_community_tax = document.getElementById('basic_community_tax').value;
   const community_tax_due = document.getElementById('community_tax_due').value;
   const total = document.getElementById('total').value;
   const interest = document.getElementById('interest').value;
   const total_amount_paid = document.getElementById('total_amount_paid').value;
   const payment_method = document.getElementById('payment_method').value;
   const payment_reference_number = document.getElementById('payment_reference_number').value;
   const ticket_number = document.getElementById('ticket_number').value;

   const data = {
     FirstName: first_name,
     MiddleName: middle_name || '',
     LastName: last_name,
     ExtensionName: extension_name || '',
     Sex: sex,
     Region: region,
     Province: province,
     Municipality: municipality,
     DateOfBirth: date_of_birth,
     PlaceOfBirth: place_of_birth,
     CivilStatus: civil_status,
     Citizenship: citizenship,
     ICRNo: icr_no || '',
     Height: height,
     Weight: weight || '',
     Employed: employed,
     TIN: tin || '',
     profession: profession,
     GrossEarnings: gross_earnings,
     taxableAmount: taxable_amount,
     basicCommunityTax: basic_community_tax,
     communityTaxDue: community_tax_due,
     Total: total,
     Interest: interest,
     TotalAmountPaid: total_amount_paid,
     paymentMethod: payment_method,
     paymentReferenceNumber: payment_reference_number,
     ticketNumber: ticket_number,
   };

   const individualId = document.getElementById('save').getAttribute('data-id');

   const url = `/api/individuals/${individualId}`;
   axios.put(url, data)
   .then(response => {
    document.getElementById('closeModal').click();
    clearForm();
    populateIndividualsTable();
   })
   .catch(error => {
        console.error("Error updating individual's cedula", error);
   });
}

function clearForm(){
    document.getElementById('first_name').value = '';
    document.getElementById('middle_name').value = '';
    document.getElementById('last_name').value = '';
    document.getElementById('extension_name').value = '';
    document.getElementById('sex').value = '';
    document.getElementById('region').value = '';
    document.getElementById('province').value = '';
    document.getElementById('municipality').value = '';
    document.getElementById('date_of_birth').value = '';
    document.getElementById('place_of_birth').value = '';
    document.getElementById('civil_status').value = '';
    document.getElementById('citizenship').value = '';
    document.getElementById('icr_no').value = '';
    document.getElementById('height').value = '';
    document.getElementById('weight').value = '';
    document.getElementById('employed').value = '';
    document.getElementById('tin').value = '';
    document.getElementById('profession').value = '';
    document.getElementById('gross_earnings').value = '';
    document.getElementById('taxable_amount').value = '';
    document.getElementById('basic_community_tax').value = '';
    document.getElementById('community_tax_due').value = '';
    document.getElementById('total').value = '';
    document.getElementById('interest').value = '';
    document.getElementById('total_amount_paid').value = '';
    document.getElementById('payment_method').value = '';
    document.getElementById('payment_reference_number').value = '';
    document.getElementById('ticket_number').value = '';
}

async function getIndividualById(individualId){
    try {
        const response = await axios.get(`/api/individuals/${individualId}`);
        return response.data
    } catch (error) {
        console.error("Error fetching individual:", error);
        return null;
    }
}

async function deleteIndividualData(individualId) {
    try {
        const individual = await getIndividualById(individualId);
        const firstName = individual.FirstName;
        const lastName = individual.LastName;

        // Display a confirmation dialog before deleting
        const isConfirmed = confirm(`Are you sure you want to delete ${firstName} ${lastName}'s cedula?`);
        
        if (isConfirmed) {
            await axios.delete(`/api/individuals/${individualId}`);
            populateIndividualsTable();
    
            alert(`${firstName} ${lastName}'s cedula deleted successfully`);
        }
    } catch (error) {
        console.error("Error deleting individual's cedula:", error);
    }
}