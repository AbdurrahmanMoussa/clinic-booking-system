<div>
 
    <x-dashboard-card
    title="View Appointments"
    icon="fas fa-calendar"
    :route="route('doctor.dashboard')"
    description="Check your upcoming and past appointments."
/>
    <x-dashboard-card
    title="View Appointments"
    icon="fas fa-calendar"
    :route="route('doctor.create-appointment')"
    description="Check your upcoming and past appointments."
/>

<x-dashboard-card
    title="Manage Profile"
    icon="fas fa-user-cog"
    :route="route('doctor.dashboard')"
    description="Update your personal information."
/>

</div>
