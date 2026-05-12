@props([
    'plan' => null
])

<div style="
    width: 220px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    border-right: 1px solid #cfcfcf;
    background: #fafafa;
    font-family: Georgia, serif;
    padding: 20px 16px;
">

    <h3 style="
        margin-top: 0;
        margin-bottom: 18px;
        font-size: 18px;
        font-weight: normal;
        color: #222;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    ">
        Dashboard
    </h3>

    <nav style="
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 14px;
        font-family: Arial, sans-serif;
    ">

        <x-sidebar-link href="/dashboard">Dashboard</x-sidebar-link>

        <x-sidebar-link href="/tickets"
            :disabled="!in_array($plan, ['basic','standard','enterprise'])"
        >
            Tickets
        </x-sidebar-link>

        <x-sidebar-link href="/customers"
            :disabled="!in_array($plan, ['basic','standard','enterprise'])"
        >
            Customers
        </x-sidebar-link>

        <x-sidebar-link href="/employees"
            :disabled="!in_array($plan, ['standard','enterprise'])"
        >
            Employees
        </x-sidebar-link>

        <x-sidebar-link href="/sla"
            :disabled="!in_array($plan, ['enterprise'])"
        >
            SLA
        </x-sidebar-link>

        <x-sidebar-link href="/messages">Messages</x-sidebar-link>

    </nav>

</div>