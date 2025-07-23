<div>
 
    <x-dashboard-card
    title="View Appointments"
    icon="fas fa-calendar"
    :route="route('patient.create-appointment')"
    description="Check your upcoming and past appointments."
/>

<x-dashboard-card
    title="Manage Profile"
    icon="fas fa-user-cog"
    :route="route('patient.dashboard')"
    description="Update your personal information."
/>

</div>
