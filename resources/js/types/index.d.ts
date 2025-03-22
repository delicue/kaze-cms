import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    role: string;
}

export interface Post {
    id: number;
    slug: string;
    title: string;
    content: string;
    user: string;
    category: string;
    created_at: string;
    updated_at: string;
}

export interface Category {
    id: number;
    name: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};
