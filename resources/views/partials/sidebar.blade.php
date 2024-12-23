<div class="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
    </div>
    <ul class="menu">
        <li class="menu-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="menu-item"><a href="{{ route('wa.sender') }}">WhatsApp Sender</a></li>
        <li class="menu-item"><a href="{{ route('wa.schedule') }}">Schedule Message</a></li>
        <li class="menu-item"><a href="{{ route('wa.auto-reply') }}">Auto Reply</a></li>
        <li class="menu-item"><a href="{{ route('wa.contacts') }}">Contact Save</a></li>
        <li class="menu-item"><a href="{{ route('wa.receive') }}">Receive Message</a></li>
        <li class="menu-item"><a href="{{ route('settings') }}">Settings</a></li>
        <li class="menu-item"><i class="bx bxl-whatsapp"></i><a href="{{ route('whatsapp.index') }}">WhatsApp</a></li>
    </ul>
    <div class="profile">
        <a href="{{ route('profile') }}">Profile</a>
    </div>
</div>
