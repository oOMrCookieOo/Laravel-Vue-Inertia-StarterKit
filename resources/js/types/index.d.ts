
export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

type TBreadCrumb=  {
    title: string;
    url: string;
    active: boolean;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    breadcrumbs?: TBreadCrumb[];
};
