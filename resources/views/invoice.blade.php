@extends('layouts.app')

@section('title', 'ZALD PEDIA | Invoice - ' . $order->order_id)

@section('content')
<div class="invoice-wrapper">
    
    <!-- Left Panel: Invoice Details & Manual DANA payment card -->
    <div class="invoice-card glass-panel" style="padding: 30px; border-radius: 20px;">
        <div class="invoice-header-block">
            <div>
                <h4 style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 5px;">Transaction Reference</h4>
                <h2 class="text-gradient" style="font-family: var(--font-heading); font-size: 1.8rem; margin: 0;">{{ $order->order_id }}</h2>
            </div>
            <span class="invoice-badge pending">{{ $order->status }}</span>
        </div>

        <table class="detail-table">
            <tbody>
                <tr>
                    <td>Service Category</td>
                    <td style="text-transform: uppercase; color: var(--secondary);">{{ $service->category }}</td>
                </tr>
                <tr>
                    <td>Product Selected</td>
                    <td>{{ $service->name }}</td>
                </tr>
                @if($order->game_id)
                    <tr>
                        <td>Game ID (Zone ID)</td>
                        <td class="text-cyan">{{ $order->game_id }} ({{ $order->zone_id }})</td>
                    </tr>
                @endif
                @if($order->account_email)
                    <tr>
                        <td>Login Credential Email</td>
                        <td class="text-cyan">{{ $order->account_email }}</td>
                    </tr>
                    <tr>
                        <td>Login Via</td>
                        <td style="text-transform: capitalize;">{{ $order->login_via }}</td>
                    </tr>
                    @if($order->hero_request)
                        <tr>
                            <td>Boosting Notes / Hero Request</td>
                            <td><small style="color: var(--text-muted);">{{ $order->hero_request }}</small></td>
                        </tr>
                    @endif
                @endif
                <tr>
                    <td>Payment Method</td>
                    <td style="text-transform: uppercase;">{{ $order->payment_method }}</td>
                </tr>
                <tr>
                    <td>Date & Time</td>
                    <td>{{ $order->created_at->format('M d, Y H:i:s') }}</td>
                </tr>
                <tr style="border-top: 1.5px solid var(--border-color); border-bottom: none;">
                    <td style="font-size: 1.1rem; font-weight: 800; padding-top: 20px;">Total Bill</td>
                    <td class="checkout-stat-val total-price" style="font-size: 1.8rem; padding-top: 20px; font-weight: bold; color: var(--accent);">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- BOLD Manual DANA Transfer instructions card -->
        <div style="background: rgba(0, 240, 255, 0.03); padding: 25px; border-radius: 16px; border: 1.5px solid var(--primary); text-align: left; margin: 25px 0; box-shadow: 0 0 25px rgba(0, 240, 255, 0.15);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 12px; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.06); padding-bottom: 8px;">
                <span class="input-label" style="margin-bottom:0; font-size:0.85rem; font-weight: bold; color: var(--text-main);"><i class="fa-solid fa-wallet text-cyan"></i> DANA Transfer Details</span>
                <img src="https://i.ibb.co/sK3Yh5v/dana.png" style="height:18px;" alt="DANA">
            </div>
            <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 4px;">DANA Account Number:</p>
            <h2 class="text-cyan" style="font-family: var(--font-main); letter-spacing: 1px; font-size: 1.7rem; margin-bottom: 8px; font-weight: bold;" id="dana-number">085135689013</h2>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 15px;">Account Name: <strong class="text-pink" style="font-size: 0.95rem;">ZALD PEDIA</strong></p>
            <button class="btn btn-primary btn-block btn-sm" onclick="copyDanaNumber()" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); border: none; font-weight: bold;"><i class="fa-solid fa-copy"></i> Copy DANA Number</button>
        </div>

        <div style="background: rgba(0, 255, 135, 0.04); padding: 15px; border-radius: 12px; border: 1px dashed var(--success); text-align: center; margin-bottom: 20px;">
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 12px;">Silakan bayar transfer ke nomor DANA di atas kemudian klik konfirmasi WhatsApp di bawah.</p>
            
            <!-- WhatsApp Confirmation button containing pre-filled parameters -->
            @php
                $waNumber = '6285135689013';
                if ($order->game_id) {
                    $waMessage = "Halo ZALD PEDIA, saya mau konfirmasi pembayaran.
Order ID: " . $order->order_id . "
Game: Mobile Legends
ID (Zone): " . $order->game_id . " (" . $order->zone_id . ")
Produk: " . $service->name . "
Harga: Rp " . number_format($order->total_price, 0, ',', '.');
                } else {
                    $waMessage = "Halo ZALD PEDIA, saya mau konfirmasi pembayaran Jasa Joki.
Order ID: " . $order->order_id . "
Game: Mobile Legends (Joki)
Login Account: " . $order->account_email . " (" . strtoupper($order->login_via) . ")
Produk: " . $service->name . "
Harga: Rp " . number_format($order->total_price, 0, ',', '.');
                }
                $waUrl = 'https://wa.me/' . $waNumber . '?text=' . rawurlencode($waMessage);
            @endphp
            <a href="{{ $waUrl }}" target="_blank" class="btn btn-primary btn-block btn-lg" style="background: linear-gradient(135deg, #25D366, #128C7E); box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3); border: none; font-weight: bold; border-radius: 14px;">
                <i class="fa-brands fa-whatsapp"></i> Confirm via WhatsApp
            </a>
        </div>
    </div>
</div>

<script>
    function copyDanaNumber() {
        const num = document.getElementById("dana-number").textContent;
        navigator.clipboard.writeText(num);
        ToastNotification.show("DANA Number copied to clipboard!", "success");
    }
</script>
@endsection
