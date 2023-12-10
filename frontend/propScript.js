// Sample property data (replace with your data)
const properties = [
    {
        id: 1,
        title: "Property 1",
        location: "Location 1",
        price: "$100,000",
        image: "property1.jpg",
        description: "This is property 1.",
    }
];

// Function to generate property cards
function generatePropertyCards() {
    const propertyList = document.getElementById("property-list");

    if (properties.length === 0) {
        // Display a card with a "+" symbol if there are no properties
        const addPropertyCard = document.createElement("div");
        addPropertyCard.classList.add("add-property-card");
        addPropertyCard.innerHTML = `<p>+</p>`;
        addPropertyCard.addEventListener("click", () => {
            // Implement logic to redirect to the property creation page
            window.location.href = "./createproperty.html";
        });
        propertyList.appendChild(addPropertyCard);
    } else {
        // Display property cards if properties exist
        properties.forEach((property) => {
            const card = document.createElement("div");
            card.classList.add("property-card");
            card.innerHTML = `
                <img src="${property.image}" alt="${property.title}">
                <h2>${property.title}</h2>
                <p>Location: ${property.location}</p>
                <p>Price: ${property.price}</p>
                <button onclick="showPropertyDetails(${property.id})">View Details</button>
            `;

            propertyList.appendChild(card);
        });
    }
}

/// Function to show property details modal
function showPropertyDetails(propertyId) {
    const property = properties.find((p) => p.id === propertyId);

    if (property) {
        const modal = document.getElementById("property-details-modal");
        modal.innerHTML = `
            <h2>${property.title}</h2>
            <p>Location: ${property.location}</p>
            <p>Price: ${property.price}</p>
            <p>Description: ${property.description}</p>
            <!-- Add this button to the modal -->
<button id="update-button" onclick="openUpdateForm()">Update Property</button>
            <button onclick="deleteProperty(${property.id})">Delete</button>
            <button onclick="closePropertyModal()">Close</button>
        `;

        modal.style.display = "block";
    }
}
// Function to open the update form
function openUpdateForm() {
    // Get the property details modal
    const modal = document.getElementById("property-details-modal");
    
    // Hide the property details modal
    modal.style.display = "none";
    
    // Get the update form container
    const updateForm = document.getElementById("update-form");
    
    // Display the update form
    updateForm.style.display = "block";
    
    // Populate the update form fields with pre-existing values
    const propertyIdToUpdate = parseInt(document.getElementById("property-id").value);
    const propertyToUpdate = properties.find((p) => p.id === propertyIdToUpdate);
    
    if (propertyToUpdate) {
        document.getElementById("location-update").value = propertyToUpdate.location;
        document.getElementById("age-update").value = propertyToUpdate.age;
        document.getElementById("floor-plan-update").value = propertyToUpdate.floor_plan;
        document.getElementById("bedrooms-update").value = propertyToUpdate.bedrooms;
        document.getElementById("facilities-update").value = propertyToUpdate.facilities;
        document.getElementById("garden-update").checked = propertyToUpdate.garden;
        const parkingRadio = document.getElementsByName("parking-update");
        for (let i = 0; i < parkingRadio.length; i++) {
            if (parkingRadio[i].value === propertyToUpdate.parking) {
                parkingRadio[i].checked = true;
            }
        }
        document.getElementById("proximity-facilities-update").value = propertyToUpdate.proximity_facilities;
        document.getElementById("proximity-roads-update").value = propertyToUpdate.proximity_roads;
        document.getElementById("property-value-update").value = propertyToUpdate.property_value;
    }
}

// Function to close the update form and show the property details modal
function closeUpdateForm() {
    // Hide the update form
    const updateForm = document.getElementById("update-form");
    updateForm.style.display = "none";
    
    // Show the property details modal
    const modal = document.getElementById("property-details-modal");
    modal.style.display = "block";
}

//fucntion to close properties modal
function closePropertyModal() {
    const modal = document.getElementById("property-details-modal");
    modal.style.display = "none";
}
// Simulate fetching property data from the server (replace with actual fetch logic)
function fetchPropertiesFromServer() {
    // Fetch properties from the server using a fetch API or another method
    // properties = [ ... ]; // Update properties with fetched data
    // Then, call generatePropertyCards to display the cards
    generatePropertyCards();
}

// Initialize property cards by fetching data from the server
fetchPropertiesFromServer();