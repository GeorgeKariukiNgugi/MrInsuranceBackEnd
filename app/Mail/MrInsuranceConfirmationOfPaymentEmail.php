<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Purchases\Purchase;
class MrInsuranceConfirmationOfPaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $purchaseObtained;    
    public function __construct($purhase)
    {
        $purchases = Purchase::where('id',$purhase)->get();
        foreach ($purchases as $purchase) {
            $this->purchaseObtained = $purhase;
        }
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmationOfPayment');
    }
}
