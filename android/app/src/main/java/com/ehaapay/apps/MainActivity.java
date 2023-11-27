package com.ehaapay.apps;

import com.getcapacitor.BridgeActivity;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends BridgeActivity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        // Créer une instance de WebView
        WebView webView = new WebView(this);

        // Activer JavaScript (si nécessaire)
        webView.getSettings().setJavaScriptEnabled(true);

        // Définir un WebViewClient pour gérer les chargements de page
        webView.setWebViewClient(new WebViewClient());

        // Charger l'URL de votre application Laravel
        webView.loadUrl("https://apps.ehaa-pay.com");

        // Ajouter la vue WebView à l'activité
        setContentView(webView);
    }
}