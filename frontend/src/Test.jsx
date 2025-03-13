import m from "mithril";
import { Layout } from "./views/Layout";
import { ApiService } from "./services/api";

const TestViews = {
    view: ({ attrs: { data, error } }) => (
        <Layout>
            <div class="card">
                <h1>Test API Response</h1>

                {error ? (
                    <div class="error-message">
                        Unable to fetch data: {error}
                    </div>
                ) : !data ? (
                    <div class="loading">
                        Loading data from API...
                    </div>
                ) : (
                    <div>
                        <div class="api-status-header">
                            <div class="api-status-info">
                                <span class={`lozenge ${data.status === 200 ? 'lozenge-success' : 'lozenge-removed'}`}>
                                    Status {data.status}
                                </span>
                                <span class="api-method">{data.data.method}</span>
                            </div>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Message</td>
                                    <td>{data.message}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <span class={`status ${data.status === 200 ? 'status-success' : 'status-error'}`}>
                                            {data.status}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Method</td>
                                    <td>{data.data.method}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="button-group">
                            <button class="button button-primary" onclick={() => {
                                Test.data = null;
                                Test.error = null;
                                m.redraw();
                                Test.oninit();
                            }}>
                                Refresh Data
                            </button>
                        </div>
                    </div>
                )}
            </div>
        </Layout>
    )
};

export const Test = {
    data: null,
    error: null,

    oninit: async () => {
        try {
            const result = await ApiService.getTest();
            Test.error = result.error;
            Test.data = result.error ? null : result;
        } catch (err) {
            Test.error = err.message || "Unknown error occurred";
        }
        m.redraw();
    },

    view: () => (
        <TestViews data={Test.data} error={Test.error} />
    )
};