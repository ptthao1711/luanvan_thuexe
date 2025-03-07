<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    /**
     * Tạo một phiên bản mới của thư.
     *
     * @param  mixed  $order
     * @return void
     */
    public $order;
    public function __construct($order)
    {
        //
        $this->order = $order;
        /**
     * Xây dựng thông điệp email.
     *
     * @return $this
     */
    }
    public function build()
    {
        return $this->view('pages.order_thank')  // Chỉ định view
                    ->with([
                        'orderNumber' => $this->order->ID_ORDER, // Truyền thông tin vào view
                        'orderDate' => $this->order->timepost->format('d/m/Y'),
                    ])
                    ->subject('Cảm ơn bạn đã đặt hàng');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Thank You Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
