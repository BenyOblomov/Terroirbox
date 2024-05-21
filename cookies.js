Orejime.init({
    elementID: "orejime",
    /*appElement: "#app",*/
    cookieName: "orejime",
    cookieExpiresAfterDays: 365,
    privacyPolicy: "/mentions-legales.html",
    default: !0,
    mustConsent: !0,
    mustNotice: !1,
    implicitConsent: !1,
    lang: "fr",
    logo: !0,
    debug: !1,
    translations: {
      fr: {
        consentModal: {
          title: "",
          description:
            "Nous utilisons les cookies afin de fournir les services et fonctionnalités proposés sur notre site et d’améliorer l’expérience de nos utilisateurs. Les cookies sont des données qui sont téléchargées ou stockées sur votre ordinateur ou sur tout autre appareil. Si vous acceptez l’utilisation des cookies, vous pourrez toujours la désactiver ultérieurement. Si vous supprimez ou désactivez nos cookies, vous pourriez rencontrer des interruptions ou des problèmes d’accès au site.",
        },
        consentNotice: {
          title: "Politique des cookies",
        },
        purposes: {
          analytics: "Analyse",
          security: "Sécurité",
        },
      },
    },
    apps: [
      {
        name: "google-tag-manager",
        title: "Google Tag Manager",
        cookies: [
          "_ga",
          "_gat",
          "_gid",
          "__utma",
          "__utmb",
          "__utmc",
          "__utmt",
          "__utmz",
        ],
        purposes: ["analytics"],
        required: !1,
        optOut: !1,
        default: !0,
        onlyOnce: !0,
      },
      {
        name: "terroirbox.com",
        title: "terroirbox.com",
        cookies: [
          ["XSRF-TOKEN", ".terroirbox.com"],
          ["orejime", ".terroirbox.com"],
          ["terroirbox_session", ".terroirbox.com"],
        ],
        purposes: ["security"],
        required: !0,
        optOut: !1,
        default: !0,
        onlyOnce: !0,
      },
    ],
  });